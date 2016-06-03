# Collection

A Collection represents a group of objects known as its elements. There are different types of collections and they are all different to each others in various ways. Some are indexed and others are not. Some allow duplicate elements and others do not. The collection interface contains all the general methods that all collections have in common.

## API Documentation

#### Interface weblement\collections\Collection
|                    |                                                                                                                                      |
|--------------------|--------------------------------------------------------------------------------------------------------------------------------------|
| **Extends**        | [IteratorAggregate](http://php.net/manual/en/class.iteratoraggregate.php), [Countable](http://php.net/manual/en/class.countable.php) |
| **Implemented By** | weblement\collections\CollectionObject                                                                                               |
| **Source Code**    | https://github.com/weblement/collections/blob/master/src/Collection.php                                                              |


#### Public Methods

| Method            | Description                                                                                               | Defined By                                |
|------------------ |--------------------------------------------------------------------------------------------------------   |----------------------------------------   |
| [add()](#add)             | Add an element or multiple elements to the collection.                                                    | [weblement\collections\Collection](#collection)    |
| clear()           | Removes all elements from the collection.                                                                 | [weblement\collections\Collection](#collection)    |
| contains()        | Checks whether the collection contains an element or multiple elements.                                   | [weblement\collections\Collection](#collection)    |
| count()           | Returns the number of elements in the collection.                                                         | [Countable](http://php.net/manual/en/class.countable.php)    |
| getCount()        | Returns the number of elements in the collection.                                                         | [weblement\collections\Collection](#collection)    |
| getElements()     | Returns an array with all the elements of the collection.                                                 | [weblement\collections\Collection](#collection)    |
| getIsEmpty()      | Returns whether the collection is empty.                                                                  | [weblement\collections\Collection](#collection)    |
| getIsIndexed()    | Returns whether the collection is indexed.                                                                | [weblement\collections\Collection](#collection)    |
| getIterator()     | Returns an iterator for traversing the elements in the collection.                                        | [IteratorAggregate](http://php.net/manual/en/class.iteratoraggregate.php)    |
| remove()          | Remove an element or multiple elements from the collection.                                               | [weblement\collections\Collection](#collection)    |
| toArray()         | Returns an array with all the elements of the collection.                                                 | [weblement\collections\Collection](#collection)    |


#### Method Details

###### add()
```php
public abstract function add($elements)
```
> Add elements to the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| $elements  | mixed | The elements to be added to the collection. |
| **return** | void  |                                                                                                         |
