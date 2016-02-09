<?php

namespace coderithm\collections;

use ArrayObject;
use Exception;
use InvalidArgumentException;
use Traversable;

abstract class BaseCollection extends ArrayObject implements CollectionInterface
{
    abstract public function isIndexed();

    public function __construct($elements = [])
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        $this->addAll($elements);
    }

    public function add($element, $index = null)
    {
        if(static::isIndexed() && isset($index))
        {
            if($this->getIndex($index) === $element) {
                return false;
            }

            $this->offsetSet($index, $element);
        }
        else {
            $this->append($element);
        }

        return true;
    }

    public function addAll($elements)
    {
        $changed = false;

        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        foreach($elements as $key => $element)
        {
            if($this->add($element, $key)) {
                $changed = true;
            }
        }

        return $changed;
    }

    public function clear()
    {
        foreach($this->toArray() as $key => $element)
        {
            $this->offsetUnset($key);
        }
    }

    public function contains($element, $strict = false)
    {
        foreach($this as $value)
        {
            if(json_encode($element) == json_encode($value) && (!$strict || $element == $value)) {
                return true;
            }
        }

        return false;
    }

    public function containsAll($elements)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        foreach($elements as $element)
        {
            if(!$this->contains($element)) {
                return false;
            }
        }

        return true;
    }

    public function containsIndex($index, $caseSensitive = true)
    {
        if ($caseSensitive) {
            return array_key_exists($index, $this->toArray());
        }
        else 
        {
            foreach (array_keys($this->toArray()) as $key) 
            {
                if (strcasecmp($index, $key) === 0) {
                    return true;
                }
            }

            return false;
        }
    }

    public function getIndex($index, $defaultValue = null)
    {
        if ($index instanceof \Closure) {
            return $index($this, $defaultValue);
        }
        elseif($this->offsetExists($index)) {
            return $this->offsetGet($index);
        }
        else {
            return $defaultValue;
        }
    }

    public function indexOf($element, $last = false)
    {
        if(!$last) {
            return array_search($element, $this->toArray());
        }
        else {
            return array_search($element, array_reverse($this->toArray(), true));
        }
    }

    public function isEmpty()
    {
        return $this->count() === 0;
    }

    public function removeIndex($index, $caseSensitive = true)
    {
        if($this->contains($index, $caseSensitive)) {
            $this->offsetUnset($index);
            return true;
        }

        return false;
    }

    public function remove($element, $last = false)
    {
        if(($index = $this->indexOf($element, $last)) !== false) {
            $this->offsetUnset($index);
            return true;
        }

        return false;
    }

    public function removeAll($elements)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        foreach($elements as $element)
        {
            $this->remove($element);
        }
    }

    public function retainAll($elements)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        foreach($elements as $element)
        {
            if(!$this->contains($element)) {
                $this->remove($element);
            }
        }
    }

    public function toArray()
    {
        return $this->getArrayCopy();
    }
}