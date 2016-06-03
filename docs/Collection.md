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
| [clear()](#clear)            | Removes all elements from the collection.                                                                 | [weblement\collections\Collection](#collection)    |
| [contains()](#contains)         | Checks whether the collection contains an element or multiple elements.                                   | [weblement\collections\Collection](#collection)    |
| [count()](#count)            | Returns the number of elements in the collection.                                                         | [Countable](http://php.net/manual/en/class.countable.php)    |
| [getCount()](#getcount)         | Returns the number of elements in the collection.                                                         | [weblement\collections\Collection](#collection)    |
| [getElements()](#getelements)      | Returns an array with all the elements of the collection.                                                 | [weblement\collections\Collection](#collection)    |
| [getIsEmpty()](#getisempty)       | Returns whether the collection is empty.                                                                  | [weblement\collections\Collection](#collection)    |
| [getIsIndexed()](#getisindexed)     | Returns whether the collection is indexed.                                                                | [weblement\collections\Collection](#collection)    |
| [getIterator()](#getiterator)      | Returns an iterator for traversing the elements in the collection.                                        | [IteratorAggregate](http://php.net/manual/en/class.iteratoraggregate.php)    |
| [remove()](#remove)           | Remove an element or multiple elements from the collection.                                               | [weblement\collections\Collection](#collection)    |
| [toArray()](#toarray)          | Returns an array with all the elements of the collection.                                                 | [weblement\collections\Collection](#collection)    |


#### Method Details

###### add()
```php
public abstract void add($elements)
```
> Add elements to the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| $elements  | mixed | The elements to be added to the collection. |
| **return** | void  |                                                                                                         |


###### clear()
```php
public abstract void clear()
```
> Removes all elements from the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | void  |                                                                                                         |


###### contains()
```php
public abstract void contains($elements, $strict = false)
```
> Removes all elements from the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| $elements | mixed | The elements to be removed from the collection |
| $strict | boolean | if the check should be strict (i.e. use ===). If the element specified is an object, strict will always be true. |
| **return** | void  |                                                                                                         |


###### count()
```php
public abstract int count()
```
> Count elements of the collection

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | int  | The number of elements in the collection.                                                                                                        |


###### getCount()
```php
public abstract int getCount()
```
> Returns the number of elements in the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | int  | The number of elements in the collection.                                                                                                        |


###### getElements()
```php
public abstract array getElements()
```
> Returns the number of elements in the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | array  | The elements of the collection                                                                                                 |


###### getIsEmpty()
```php
public abstract boolean getIsEmpty()
```
> Check if the collection contains elements and returns true if it's empty

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | boolean  | Whether the collection is empty                                                                                        |


###### getIsIndexed()
```php
public abstract boolean getIsIndexed()
```
> Describes if the collection is indexed or not. Child classes should override this method if the elements should be indexed.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | boolean  | Whether the collection is indexed or not                                                                                       |


###### getIterator()
```php
public abstract Traversable getIterator()
```
> Retrieve an external iterator

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | Traversable  | A Traversable iterator                                                                                       |


###### remove()
```php
public abstract void remove($elements, $strict = false, $last = true)
```
> Removes the first occurence of the element from the collection starting from the last added element.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| $elements | mixed | The elements to be removed from the collection |
| $strict| boolean | If the check should be strict (i.e. use ===). If the element specified is an object, strict will always be true.  |
| $last | boolean | whether to remove the element starting from the last element in the collection |
| **return** | void  |                                                                                        |


###### toArray()
```php
public abstract array toArray()
```
> Returns an array that contains all the elements of the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| **return** | array | An array containing all the elements present in the collection.                                                                                      |
