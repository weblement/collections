<?php

namespace weblement\collections;

class Queue extends CollectionObject
{
    use Indexable;

    public function getIsIndexed()
    {
        return false;
    }

    public function peek()
    {
        return $this->getElementAt(0);
    }

    public function pop()
    {
        if(is_null($value = $this->peek())) {
            return null;
        }

        $this->remove($value, true);

        return $value;
    }

    public function pos($element)
    {
        return ($index = $this->getIndexOf($element)) ? $index + 1 : $index;
    }

    public function push($element)
    {
        return $this->add($element);
    }
}