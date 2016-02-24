<?php

namespace weblement\collections;

use Closure;

trait Indexable
{
    public function getIsIndexed()
    {
        return true;
    }

    public function hasIndex($index, $caseSensitive = true)
    {
        if ($caseSensitive) {
            return array_key_exists($index, $this->elements);
        }
        else 
        {
            foreach (array_keys($this->elements) as $key) 
            {
                if (strcasecmp($index, $key) === 0) {
                    return true;
                }
            }

            return false;
        }
    }

    public function getElementAt($index, $defaultValue = null)
    {
        if ($index instanceof Closure) {
            return $index($this, $defaultValue);
        }
        elseif($this->hasIndex($index)) {
            return $this->elements[$index];
        }
        else {
            return $defaultValue;
        }
    }

    public function getIndexOf($element, $last = false, $defaultValue = null)
    {
        if(!$last) {
            $index = array_search($element, $this->elements);
        }
        else {
            $index = array_search($element, array_reverse($this->elements, true));
        }

        return $index === false ? $defaultValue : $index;
    }

    public function removeIndex($index)
    {
        $elements = $this->elements;
        unset($elements[$index]);
        $this->elements = $elements;
        unset($elements);
    }
}