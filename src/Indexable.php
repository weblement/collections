<?php

namespace weblement\collections;

use Closure;

trait Indexable
{
    /**
     * Describes if the collection is indexed or not
     * Child classes should override this method if the elements should be indexed.
     * @return boolean whether the collection is indexed or not
     */
    public function getIsIndexed()
    {
        return true;
    }

    /**
     * Checks if the collection contains an index.
     * @param   mixed $index the index (key) to look for
     * @param   boolean $caseSensitive whether the comparison should be case sensitive.
     * @return  boolean whether the collection contain the specified index
    */
    public function hasIndex($index, $caseSensitive = true)
    {
        if ($caseSensitive) {
            return array_key_exists($index, $this->elements);
        }
        else 
        {
            foreach(array_keys($this->elements) as $key) 
            {
                if (strcasecmp($index, $key) === 0) {
                    return true;
                }
            }

            return false;
        }
    }

    /**
     * Retrieves an element from the collection by a specified index.
     * If the index does not exist, the default value will be returned.
     * @param  string|integer|Closure the index of the element or an anonymous function returning the value. 
     * The anonymous function signature should be: `function($object, $defaultValue)`.
     * @param  mixed $defaultValue the default value to return if the index specified does not exist
     * @return mixed the element at the specified index if found, otherwise the default value
     */
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

    /**
     * Looks for the index of an element from the collection and returns it. The default value
     * will be returned if the element does not exist.
     * @param  mixed  $element the element whose index should be retrieved
     * @param  boolean $last whether to start looking from the end (last element added) of the collection
     * @param  mixed $defaultValue the default value to return if the element does not exist
     * @return miced the index of the element
     */
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

    /**
     * Remove the index and it's associated element from the collection
     * This is done by removing the index in an array copy of the collection, then the elements
     * are overridden by the modified array copy
     * @param  mixed $index the index to be removed from the collection
     * @return void
     */
    public function removeIndex($index)
    {
        $elements = $this->elements;
        unset($elements[$index]);
        $this->elements = $elements;
        unset($elements);
    }
}