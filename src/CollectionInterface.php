<?php

/**
 * PHP Collection Library
 * @author      Yuv Joodhisty <locustv@gmail.com>
 * @copyright   Copyright © Coderithm 2016
 * @license     https://github.com/coderithm/collections/blob/master/LICENSE.md
 * @version     v1.0
 */

namespace coderithm\collections;

/**
 * A Collection represents a group of objects known as its elements.
 */

interface CollectionInterface
{
    public function isIndexed();

    /**
     * Adds an element to the invoking collection.
     * @param   object $element the element to be added to the collection
     * @param   mixed $index (optional) the index at which the element will be located in the collection
     * @return  boolean true if element was added to the collection.
     * false if element is already a member of the collection,
     * or if the collection does not allow duplicates
     */
    public function add($element, $index = null);

    /**
     * Adds all the elements of a collection or array to the invoking collection.
     * @param   array|CollectionInterface $collection the collection whose elements shall be added
     * @return  boolean true if the operation succeeded (i.e., the elements were added) otherwise returns false
     * @throws  InvalidArgumentException if `$collection` is is neither traversable nor an array.
     */
    public function addAll($collection);

    /**
     * Removes all elements from the collection.
     * @return  void
     */
    public function clear();

    /**
     * Checks if an element is present in the collection
     * @param   object $element the element to check
     * @return  boolean whether the collection contain the element
    */
    public function contains($element);

    /**
     * Checks if the collection contains all elements from another collection
     * @param   Collection $collection the collection to check against
     * @return  boolean whether the collection contain the elements
    */
    public function containsAll($collection);

    /**
     * Check if the collection contains elements or is empty.
     * @return  boolean whether the collection is empty
     */
    public function isEmpty();

    /**
     * Removes the first occurence of the element from the invoking collection.
     * @param   Object $element
     * @return  boolean whether the element was removed from the collections
     */
    public function remove($element);

    /**
     * Removes all elements of $collection from the invoking collection.
     * Returns true if the collection changed (i.e., elements were removed). Otherwise, returns false.
     * @param   Collection $collection
     * @return  boolean
     */
    public function removeAll($collection);

    /**
     * Removes all elements from the invoking collection except those in $collection.
     * Returns true if the collection changed (i.e., elements were removed). Otherwise, returns false.
     * @param   Collection $collection
     * @return  boolean
     */
    public function retainAll($collection);

    /**
     * Returns the number of elements held in the invoking collection.
     * @return  Integer
     */
    public function count();

    /**
     * Returns an array that contains all the elements stored in the invoking collection.
     * The array elements are copies of the collection elements.
     * @return  array
     */
    public function toArray();
}