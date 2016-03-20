<?php

namespace weblement\collections;

use Traversable;

class Set extends CollectionObject
{
    /**
     * Add elements to the collection.
     * @param   mixed $elements the elements to be added to the collection
     * @return  void
     */
    public function add($elements)
    {
        parent::add($this->complement($elements));
    }

    /**
     * Returns the difference between the collection and specified elements
     * @param  mixed $elements the elements that needs to be differentiated to
     * @param   boolean $strict if the check should be strict (e.g. object types) or not
     * @return array the elements that are not part of the collection (i.e. the elements
     * that completes the collection when union to the specified elements)
     */
    public function complement($elements, $strict = false)
    {
        $complements = [];

        if(!is_array($elements) && !($elements instanceof Traversable)) {
            $elements = (array) $elements;
        }

        foreach ($elements as $element)
        {
            if($this->contains($element, $strict) || in_array($element, $complements, $strict)) {
                continue;
            }

            $complements[] = $element;
        }

        return $complements;
    }

    /**
     * Returns an array of the collection elements with another set of elements
     * @param  mixed $elements the elements that will be added to the existing collection elements
     * @param   boolean $strict if the check should be strict (e.g. object types) or not
     * @return array an array of elements containing the elements of the set and the 
     * specified elements
     */
    public function union($elements, $strict = false)
    {
        $unions = $this->elements;

        if(!is_array($elements) && !($elements instanceof Traversable)) {
            $elements = (array) $elements;
        }

        return array_values(array_merge($this->elements, $this->complement($elements, $strict)));
    }

    /**
     * Checks and returns elements which are present in both the collection and a specified group
     * of elements
     * @param  $elements the elements that should be checked against
     * @param   boolean $strict if the check should be strict (e.g. object types) or not
     * @return array an array of elements that are present in both the collection and the specified
     * group of elements.
     */
    public function intersect($elements, $strict = false)
    {
        $intersects = [];

        if(!is_array($elements) && !($elements instanceof Traversable)) {
            $elements = (array) $elements;
        }

        foreach ($elements as $element)
        {
            if($this->contains($element, $strict)) {
                $intersects[] = $element;
            }
        }

        return $intersects;
    }
}