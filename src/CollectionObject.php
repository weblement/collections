<?php

namespace weblement\collections;

use ArrayIterator;
use InvalidArgumentException;
use Exception;
use Traversable;

abstract class CollectionObject extends Object implements Collection
{
    private $_elements = [];

    public function getIsIndexed()
    {
        return false;
    }

    public function __construct($elements = [])
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument `$elements` must be an array or implement Traversable.');
        }

        $this->add($elements);
    }

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

    public function clear()
    {
        $this->_elements = [];
    }

    public function getElements()
    {
        return $this->_elements;
    }

    protected function setElements($elements)
    {
        return $this->_elements = $elements;
    }

    public function toArray()
    {
        return $this->elements;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    public function count()
    {
        return count($this->_elements);
    }

    public function getCount() 
    {
        return $this->count();
    }

    public function getIsEmpty()
    {
        return $this->count() === 0;
    }

    public function __debugInfo()
    {
        return [
            'isEmpty' => $this->isEmpty,
            'count' => $this->count,
            'elements' => $this->elements,
        ];
    }
}