<?php

namespace weblement\collections;

use ArrayIterator;
use InvalidArgumentException;
use Exception;
use Traversable;

abstract class CollectionObject extends Object implements Collection
{
    /**
     * @var Elements[] the elements in this collection
     */
    private $_elements = [];

    /**
     * Describes if the collection is indexed or not
     * Child classes should override this method if the elements should be indexed.
     * @return boolean whether the collection is indexed or not
     */
    public function getIsIndexed()
    {
        return false;
    }

    /**
     * Constructor
     * @param array $elements the initial elements that will be part of the collection
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($elements = [], $config = [])
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument `$elements` must be an array or implement Traversable.');
        }

        static::add($elements);
        parent::__construct($config);
    }

    /**
     * Add elements to the collection.
     * @param   mixed $elements the elements to be added to the collection
     * @return  void
     */
    public function add($elements)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            $this->_elements[] = $elements;
        }
        else
        {
            foreach ($elements as $index => $element)
            {
                if(static::getIsIndexed()) {
                    $this->_elements[$index] = $element;
                }
                else {
                    $this->_elements[] = $element;
                }
            }
        }
    }

    /**
     * Checks if an element is present in the collection
     * @param   mixed $elements the elements that needs to be checked in the collection
     * @param   boolean $strict if the check should be strict (e.g. object types) or not
     * @return  boolean whether the collection contain the element
     */
    public function contains($elements, $strict = false)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            return array_search($elements, $this->getElements(), $strict) !== false;
        }
        else {
            foreach ($elements as $element) 
            {
                if(!$this->contains($element)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Removes the first occurence of the element from the invoking collection.
     * @param   mixed $elements
     * @return  void
     */
    public function remove($elements)
    {
        $elements = (array) $elements;

        if(static::getIsIndexed()) {
            $this->_elements = array_diff($this->elements, $elements);
        }
        else {
            $this->_elements = array_values(array_diff($this->elements, $elements));
        }
    }

    /**
     * Removes all elements from the collection.
     * @return  void
     */
    public function clear()
    {
        $this->_elements = [];
    }

    /**
     * Returns the elements of the collection
     * @return array the elements of the collection
     */
    public function getElements()
    {
        return $this->_elements;
    }

    /**
     * Sets the elements of the collection
     * This method should be usable only by the main or child classes
     * To add or remove elements to the collection, the `add()` and `remove()` function
     * should be used
     * @param $eelements the elements to be set as the collection elements
     * @return  void
     */
    protected function setElements($elements)
    {
        return $this->_elements = $elements;
    }

    /**
     * Returns an iterator for traversing the cookies in the collection.
     * This method is required by the SPL interface [[\IteratorAggregate]].
     * It will be implicitly called when you use `foreach` to traverse the collection.
     * @return ArrayIterator an iterator for traversing the cookies in the collection.
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    /**
     * Returns the number of cookies in the collection.
     * This method is required by the SPL `Countable` interface.
     * It will be implicitly called when you use `count($collection)`.
     * @return integer the number of cookies in the collection.
     */
    public function count()
    {
        return count($this->_elements);
    }

    /**
     * Returns the number of elements in the collection.
     * @return integer the number of elements in the collection.
     */
    public function getCount() 
    {
        return $this->count();
    }

    /**
     * Check if the collection contains elements and returns true if it's empty
     * @return  boolean whether the collection is empty
     */
    public function getIsEmpty()
    {
        return $this->count() === 0;
    }

    /**
     * Returns the elements of the collection as an array
     * @return array the elements of the collection
     */
    public function toArray()
    {
        return $this->elements;
    }
}