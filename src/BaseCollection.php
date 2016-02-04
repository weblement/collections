<?php

namespace coderithm\collections;

class BaseCollection extends \ArrayObject implements CollectionInterface
{
    abstract protected function isIndexed();

    public function __construct($elements = [])
    {
        if($elements instanceof CollectionInterface){
            $this->addAll($elements);
        }
        elseif(is_array($elements)){
            $this->addEach($elements);
        }
        else{
            throw new \InvalidArgumentException('Object of type '.get_class().' can only be created on arrays, ArrayObject, BaseCollection or CollectionInterface');
        }
    }

    public function add($element, $index = null)
    {
        if(static::isIndexed() && isset($index))
        {
            if($this->get($index) === $element) return false;

            $this->offsetSet($index, $element);
        }
        else{
            $this->append($element);
        }

        return true;
    }

    public function addEach(array $array)
    {
        $changed = false;
        
        foreach ($array as $key => $element)
        {
            if($this->add($element, $key)) $changed = true;
        }

        return $changed;
    }

    public function addAll(CollectionInterface $collection)
    {
        return $this->addEach($collection->toArray());
    }

    public function clear()
    {
        foreach ($this->toArray() as $key => $element)
        {
            $this->offsetUnset($key);
        }
    }

    public function contains($element)
    {
        foreach ($this as $value)
        {
            if(serialize($element) === serialize($value)){
                return true;
            }
        }

        return false;
    }

    public function containsAll(CollectionInterface $collection)
    {
        return $this->containsEach($collection->toArray());
    }

    public function containsEach(array $array)
    {
        foreach ($array as $value)
        {
            if(!$this->contains($value)){
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

    public function equals($object)
    {
        if(is_array($object)){
            return $this->toArray() === $object;
        }
        elseif($object instanceof CollectionInterface){
            return $this->toArray() === $object->toArray();
        }

        return false;
    }

    public function get($index, $defaultValue = null)
    {
        if ($index instanceof \Closure) {
            return $index($this, $defaultValue);
        }
        elseif($this->offsetExists($index)){
            return $this->offsetGet($index);
        }
        else{
            return $defaultValue;
        }
    }

    public function indexOf($element, $last = false)
    {
        if(!$last){
            return array_search($element, $this->toArray());
        }
        else{
            return array_search($element, array_reverse($this->toArray(), true));
        }
    }

    public function isEmpty()
    {
        return $this->count() === 0;
    }

    public function remove($element)
    {
        if(($index = $this->indexOf($element)) !== false){
            return $this->removeIndex($index);
        }

        return false;
    }

    public function removeAll(CollectionInterface  $collection)
    {
        return $this->removeEach($collection->toArray());
    }

    public function removeEach(array $array)
    {
        $changed = false;

        foreach ($array as $element)
        {
            if($this->remove($element)){
                $changed = true;
            }
        }

        return $changed;
    }

    protected function removeIndex($index)
    {
        if($this->containsIndex($index))
        {
            $this->offsetUnset($index);

            return true;
        }

        return false;
    }

    public function retainAll(CollectionInterface $collection)
    {
        return $this->retainEach($collection->toArray());
    }

    public function retainEach(array $array)
    {
        $changed = false;

        foreach ($array() as $element)
        {
            if(!$collection->contains($element))
            {
                $this->remove($element);
                $changed = true;
            }
        }

        return $changed;
    }

    public function set($index, $element)
    {
        $value = $this->get($index);

        $this->offsetSet($index, $element);

        return $value;
    }

    public function toArray()
    {
        return $this->getArrayCopy();
    }

    public function toSerializedArray()
    {
        $array = array();

        foreach ($this->toArray() as $key => $value)
        {
            $array[$key] = serialize($value);
        }

        return $array;
    }

    public function __tostring()
    {
        $string = @get_class($this) . "[" . $this->size() . "] { ";
        $string .= implode(', ', $this->toArray());
        $string .= " }";
        return $string;
    }

}