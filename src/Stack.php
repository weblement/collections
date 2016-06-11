<?php

namespace weblement\collections;

class Stack extends CollectionObject
{
    use Indexable;

    /**
     * Describes if the collection is indexed or not
     * Child classes should override this method if the elements should be indexed.
     * @return boolean whether the collection is indexed or not
     */
    public function getIsIndexed()
    {
        return false;
    }

    /**
     * Returns the element at the top of the stack
     * @return  mixed the element at the top of the stack if any, otherwise `null`
     */
    public function peek()
    {
        return $this->getElementAt($this->count - 1);
    }

    /**
     * Remove and returns the element at the top of the stack
     * @return mixed the element at the top of the stack if any, otherwise `null`
     */
    public function pop()
    {
        if(is_null($value = $this->peek())) {
            return null;
        }

        $this->remove($value, true, true);

        return $value;
    }

    /**
     * Return the position of an element starting from the top of the stack.
     * @param  mixed $element the element to look for in the stack
     * @return int the position of the first element found in the stack
     */
    public function pos($element)
    {
        return ($index = $this->getIndexOf($element, true)) ? $this->count - $index : $index;
    }

    /**
     * Add an element to the stack.
     * @param  mixed $element the element to be added to the stack
     * @return void
     */
    public function push($element)
    {
        $this->add($element);
    }
}