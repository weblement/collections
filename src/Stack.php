<?php

namespace weblement\collections;

class Stack extends CollectionObject
{
    use Indexable;

    public function getIsIndexed()
    {
        return false;
    }

    public function peek()
    {
        return $this->getElementAt($this->count - 1);
    }

    public function pop()
    {
        if(is_null($value = $this->peek())) {
            return null;
        }

        $this->remove($value, true, true);

        return $value;
    }

    public function pos($element)
    {
        return ($index = $this->getIndexOf($element, true)) ? $this->count - $index : $index;
    }

    public function push($element)
    {
        return $this->add($element);
    }
}