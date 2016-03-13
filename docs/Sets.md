# Sets

A set is a collection of distinct elements, i.e. a collection that contains no duplicate elements. Sets contain no pair of elements `element1` and `element2` such that `element1 === element2`.


## Basic Operations

There are many operations that can be used when working with sets. The most fundamental operations are:
* Unions
* Intersections
* Complements


#### Unions
Unions are made by the addition of two or more sets together. The *union* of `SetA` and `SetB` is the set of all elements that are members of either `SetA` or `SetB`.

![The union of two sets](https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Venn0111.svg/220px-Venn0111.svg.png)

#### Intersections
The intersection of two sets `SetA` and `SetB` is the set of all elements that are members of both `SetA` and `SetB`.

![The union of two sets](https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Venn0001.svg/220px-Venn0001.svg.png)

#### Complements
The complement of two sets `SetA` and `SetB` can also be called the difference of `SetA` and `SetB`. The complement of `SetB` in `SetA` is the set of all elements that are members of `SetA` but not members of `SetB`.

![The complement of SetB in SetA](https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Venn0100.svg/220px-Venn0100.svg.png)


## API Documentation

#### Class weblement\collections\Set
|                   |                                                                           |
|-----------------  |-----------------------------------------------------------------------    |
| **Implements**    | [IteratorAggregate](http://php.net/manual/en/class.iteratoraggregate.php), [Countable](http://php.net/manual/en/class.countable.php), weblement\collections\Collection            |
| **Inheritance**   | weblement\collections\Object » weblement\collections\CollectionObject     |
| **Uses Traits**   | N/A                                                                       |
| **Source Code**   | https://github.com/weblement/collections/blob/master/src/Set.php          |
