<?php

namespace weblement\collections;

class Map extends CollectionObject
{
    use Indexable;

    public function add($elementKey, $elementValue = null)
    {
        return (isset($elementKey) and isset($elementValue))
            ?  parent::add($elementKey, $elementValue)
            : false;
    }

    public function containsKey($key)
    {
        return $this->hasIndex($key);
    }

    public function containsValue($value)
    {
        return $this->contains($value);
    }

    public function get($key)
    {
        return parent::get($key);
    }

    public function remove($key)
    {
        return parent::removeIndex($key);
    }    
}