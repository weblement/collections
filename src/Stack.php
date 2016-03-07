<?php

namespace weblement\collections;

class Stack extends CollectionObject
{
    public function peek()
    {
        return $this->getIndex($this->count() - 1);
    }

    public function pop()
    {
        if(is_null($value = $this->peek())) {
            return null;
        }

        $this->remove($value, true);
        $arr = $this->toArray();
        $this->clear();
        $this->addAll($arr);
        unset($arr);

        return $value;
    }

    public function pos($element)
    {
        return ($index = $this->indexOf($element)) ? $index + 1 : $index;
    }

    public function push($element)
    {
        return $this->add($element);
    }
}