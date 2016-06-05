<?php

namespace weblement\collections;

use ArrayIterator;
use InvalidArgumentException;

abstract class CollectionObject extends Object implements Collection
{
    /**
     * @var Elements[] the elements in this collection
     */
    protected $_elements = [];

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
    public function __construct(array $elements = [], array $config = [])
    {
        if(!is_array($elements)) {
            throw new InvalidArgumentException('Argument `$elements` must be an array.');
        }

        static::add($elements);
        parent::__construct($config);
    }

    /**
     * Add an element or multiple elements to the collection.
     * The default implementation allows you to add one or multiple elements (specified as an array)
     * 
     * For non-indexed collection, `getIsIndexed() === false` 
     * 
     * To append one element at the end of the collection, simply use:
     * `$collection->add('a')` or `$collection->add(['a'])`
     * 
     * To add multiple elements use:
     * `$collection->add(['a', 'b', 'c'])`
     * 
     * To add the elements from another Collection (CollectionObject) use:
     * `$collection->add($collection2->elements)`
     * 
     * To add a Collection itself to the elements:
     * `$collection->add($collection2)` or `$collection->add([$collection2])`
     * 
     * To append an array to the collection
     * `$collection->add([['a', 'b', 'c']])`
     * 
     * To append multiple arrays, just add them to the array parameter: 
     * `$collection->add([['a', 'b', 'c'], ['d', 'e', 'f']])`
     *
     * 
     * For indexed collection `getIsIndexed() === true` 
     * 
     * To append one element at the end of the collection, use:
     * `$collection->add('a')`
     * 
     * To add an element at a specific index, pass the element using an array where the key is the index:
     * `$collection->add(['key' => 'value'])`
     * This will override the existing element at the specified index.
     * 
     * To add an array or another collection to an index, just add it to the value:
     * `$collection->add(['key' => $collection])`, `$collection->add(['key' => ['a', 'b', 'c']])`
     * 
     * To add multiple arrays or collections, add them to the array:
     * `$collection->add(['key1' => ['a', 'b', 'c'], 'key2' => ['d', 'e', 'f']])`
     * 
     * @param mixed $elements the elements to be added to the collection
     * @return void
     */
    public function add($elements)
    {
        if(!is_array($elements)) {
            $this->_elements[] = $elements;
        }
        else
        {
            foreach($elements as $index => $element)
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
     * Checks if an element / multiple elements is / are in the collection
     * 
     * Checking a single element:
     * `$value = ...` can be anything but an array:
     * `$collection->contains($value)`
     * 
     * Check if collection contains multiple values:
     * `$values = ['a', 'b', 'c']`;
     * `$collection->contains($values)`
     *
     * Check if collection contains an array:
     * `$array = ['a', 'b', 'c']`;
     * `$collection->contains([$array])`
     *
     * Check if collection contains the elements from another collection `$c`
     * `$collection->contains($c->elements)`
     *
     * Check if collection contains another collection `$c`
     * `$collection->contains($c)`
     *
     * When using `$strict`, strict comparison will be done
     * i.e. `'123' !== 123`, `123 === 123`
     * When `$strict` is false, `'123' == 123`
     *
     * If looking for an object in the collection, strict will always be true even if speficied as false
     * 
     * @param mixed $elements the elements that needs to be checked in the collection
     * @param boolean $strict if the check should be strict (i.e. use ===)
     * If the element specified is an object, strict will always be true.
     * @return  boolean whether the collection contain the elements specified
     */
    public function contains($elements, $strict = false)
    {
        if(!is_array($elements)) {
            return in_array($elements, $this->elements, is_object($elements) || $strict);
        }
        else {
            foreach($elements as $element) 
            {
                if(!in_array($element, $this->elements, is_object($element) || $strict)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Removes the first occurence of the element from the collection starting from the last added element.
     * @param mixed $elements the elements to be removed from the collection
     * @param boolean $strict if the check should be strict (i.e. use ===)
     * If the element specified is an object, strict will always be true.
     * @param boolean $last whether to remove the element starting from the last element in the collection
     * @return void
     */
    public function remove($elements, $strict = false, $last = true)
    {
        $collectionElements = $this->elements;
        $index = [];

        if(!is_array($elements)) {
            $index[] = array_search($elements, $last ? array_reverse($collectionElements, true) : $collectionElements, is_object($elements) || $strict);
        }
        else {
            foreach($elements as $element)
            {
                $index[] = array_search($element, $last ? array_reverse($collectionElements, true) : $collectionElements, is_object($element) || $strict);
            }
        }

        foreach($index as $key)
        {
            unset($collectionElements[$key]);
        }

        if(static::getIsIndexed()) {
            $this->elements = $collectionElements;
        }
        else {
            $this->elements = array_values($collectionElements);
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
     * Returns an iterator for traversing the elements in the collection.
     * This method is required by the SPL interface [[\IteratorAggregate]].
     * It will be implicitly called when you use `foreach` to traverse the collection.
     * @return ArrayIterator an iterator for traversing the elements in the collection.
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    /**
     * Returns the number of elements in the collection.
     * This method is required by the SPL `Countable` interface.
     * It will be implicitly called when you use `count($collection)`.
     * @return integer the number of elements in the collection.
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
     * @return array An array containing all the elements present in the collection
     */
    public function toArray()
    {
        return $this->elements;
    }
}