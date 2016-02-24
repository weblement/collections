<?php

/**
 * PHP Collection Library
 * @author      Yuv Joodhisty <locustv@gmail.com>
 * @copyright   Copyright © weblement 2016
 * @license     https://github.com/weblement/collections/blob/master/LICENSE.md
 * @version     v1.0
 */

namespace weblement\collections;
use IteratorAggregate;
use Countable;
use ArrayAccess;

/**
 * A Collection represents a group of objects known as its elements.
 */

interface Collection extends IteratorAggregate, Countable
{
    /**
     * Describes if the collection is indexed or not
     * @return boolean whether the collection is indexed or not
     */
    /*public function isIndexed();*/


    /**
     * Adds an element to the invoking collection.
     * @param   object $element the element to be added to the collection
     * @param   mixed $index (optional) the index at which the element will be located in the collection
     * @return  void
     */
    /*public function add($element, $index = null);*/


    /**
     * Adds all the elements of a collection or array to the invoking collection.
     * @param   object $elements the elements to be added
     * @return  void
     * @throws  InvalidArgumentException if `$collection` is is neither traversable nor an array.
     */
    /*public function addAll($elements);*/


    /**
     * Removes all elements from the collection.
     * @return  void
     */
    /*public function clear();*/


    /**
     * Checks if an element is present in the collection
     * @param   object $element the element to check
     * @param   boolean $strict whether to do strict comparison to check for the element
     * @return  boolean whether the collection contain the element
    */
    /*public function contains($element, $strict = false);*/


    /**
     * Checks if the collection contains all elements from another collection
     * @param   object $elements the collection to check against
     * @return  boolean whether the collection contain the elements
    */
    /*public function containsAll($elements);*/


    /**
     * Checks if the collection contains an index. `isIndexed()` should return true;
     * @param   mixed $index the index (key) to look for
     * @param   boolean $caseSensitive whether the comparison should be case sensitive.
     * @return  boolean whether the collection contain the specified index
    */
    /*public function containsIndex($index, $caseSensitive = true);*/


    /**
     * Retrieves the value at a specified index.
     * @param  mixed $index the index to look for
     * @param  boolean $defaultValue the default value to return if the specified index does not exist
     * @return mixed the value of the element if found, otherwise the defaultValue
     */
    /*public function getIndex($index, $defaultValue = null);*/


    /**
     * Obtain the index of a specified element.
     * @param  mixed $element the element to look for
     * @param  boolean $last whether to start looking from the last element
     * @param  boolean $defaultValue the default value to return if the specified index does not exist
     * @return mixed the index of the specified element if found, otherwise the defaultValue
     */
    /*public function indexOf($element, $last = false, $defaultValue = null);*/


    /**
     * Check if the collection contains elements or is empty.
     * @return  boolean whether the collection is empty
     */
    /*public function isEmpty();*/


    /**
     * Removes the specified index from the collection.
     * @param   mixed $index the index to be removed
     * @param   boolean $caseSensitive whether the index to look for should be case sensitive.
     * @return  void
     */
    /*public function removeIndex($index, $caseSensitive = true);*/


    /**
     * Removes the first occurence of the element from the invoking collection.
     * @param   mixed $element the element to be removed from the collection
     * @param   boolean $last whether to start removing from the last element
     * @return  void
     */
    /*public function remove($element, $last = false);*/


    /**
     * Removes all elements, specified, from the invoking collection.
     * @param   mixed $elements the elements to be removed
     * @return  void
     */
    /*public function removeAll($elements);*/


    /**
     * Retain all elements, specified, from the invoking collection.
     * @param   mixed $elements the elements to be retained
     * @return  void
     */
    /*public function retainAll($elements);*/


    /**
     * Returns an array that contains all the elements of the collection.
     * @return  array the array of elements
     */
    /*public function toArray();*/
}