<?php

namespace weblement\collections;

class Set extends CollectionObject
{

    public function complement($elements)
    {
        $complements = [];

        if(!is_array($elements) && !($elements instanceof Traversable)) {
            $elements = (array) $elements;
        }

        foreach ($elements as $element)
        {
            if($this->contains($element) || in_array($element, $complements)) {
                continue;
            }

            $complements[] = $element;
        }

        return $complements;
    }

    public function add($elements)
    {
        parent::add($this->complement($elements));
    }

    public function union($elements)
    {
        return array_values(array_merge($this->elements, $this->complement($elements)));
    }

    public function intersect($elements)
    {
        return array_values(array_intersect($this->elements, $elements));
    }
}