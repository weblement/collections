<?php

namespace weblement\collections;

use ArrayObject;
use InvalidArgumentException;
use Traversable;
use Closure;

abstract class BaseCollection extends ArrayObject implements Collection
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
        if(static::isIndexed() && isset($index)) {
            $this->offsetSet($index, $element);
        }
        else {
            $this->append($element);
        }
    }

    public function addAll($elements)
    {
        if(!is_array($elements) && !($elements instanceof Traversable)) {
            throw new InvalidArgumentException('Argument $elements must be an array or implement Traversable.');
        }

        foreach($elements as $key => $element)
        {
            $this->add($element, $key);
        }
    }

    public function clear()
    {
        $this->exchangeArray([]);
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
        if ($index instanceof Closure) {
            return $index($this, $defaultValue);
        }
        elseif($this->offsetExists($index)) {
            return $this->offsetGet($index);
        }
        else {
            return $defaultValue;
        }
    }

    public function indexOf($element, $last = false, $defaultValue = null)
    {
        if(!$last) {
            $index = array_search($element, $this->toArray());
        }
        else {
            $index = array_search($element, array_reverse($this->toArray(), true));
        }

        return $index === false ? $defaultValue : $index;
    }

    public function isEmpty()
    {
        return $this->count() === 0;
    }

    public function removeIndex($index, $caseSensitive = true)
    {
        if($this->containsIndex($index, $caseSensitive)) {
            $this->offsetUnset($index);
        }
    }

    public function remove($element, $last = false)
    {
        if(($index = $this->indexOf($element, $last)) !== false) {
            $this->offsetUnset($index);
        }
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

    public function __debugInfo() {
        return [
            'propSquared' => $this->toArray(),
        ];
    }
}