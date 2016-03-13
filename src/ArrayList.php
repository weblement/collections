<?php

namespace weblement\collections;

class ArrayList extends CollectionObject
{
	use Indexable;

    public function add($elements)
    {
        if(!is_array($elements)) {
            $this->_elements[] = $elements;
        }
        else
        {
            foreach($elements as $index => $element)
            {
                if(is_integer($index)) {
                    $this->_elements[$index] = $element;
                }
                else {
                    $elems = $this->elements;
                    end($elems);
                    $lastIndex = key($elems);
                    $this->_elements[$lastIndex+1] = $element;
                }
            }
        }
    }
}