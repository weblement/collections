<?php

namespace weblement\collections;

class Queue extends CollectionObject
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
     * Returns the element at the top of the queue
     * @return  mixed the element at the top of the queue if any, otherwise `null`
     */
    public function peek()
    {
        return $this->getElementAt(0);
    }

    /**
     * Remove and returns the element at the top of the queue
     * @return mixed the element at the top of the queue if any, otherwise `null`
     */
    public function pop()
    {
        if(is_null($value = $this->peek())) {
            return null;
        }

        $this->remove($value, true);

        return $value;
    }

    /**
     * Return the position of an element starting from the top of the queue.
     * @param  mixed $element the element to look for in the queue
     * @return int the position of the first element found in the queue
     */
    public function pos($element)
    {
        return ($index = $this->getIndexOf($element)) ? $index + 1 : $index;
    }

    /**
     * Add an element to the queue.
     * @param  mixed $element the element to be added to the queue
     * @return void
     */
    public function push($element)
    {
        $this->add($element);
    }
}