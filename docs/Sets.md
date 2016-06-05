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
|                   |                                                                                                                                                                                   |
|-----------------  |-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    |
| **Implements**    | [weblement\collections\Collection](https://github.com/weblement/collections/blob/master/docs/Collection.md)            |
| **Inheritance**   | weblement\collections\Object » [weblement\collections\CollectionObject](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md)                                                                                                             |
| **Uses Traits**   | N/A                                                                                                                                                                               |
| **Source Code**   | https://github.com/weblement/collections/blob/master/src/Set.php                                                                                                                  |


#### Public Properties

| Property      | Type              | Description                                                           | Defined By                                |
|-----------    |---------------    |--------------------------------------------------------------------   |----------------------------------------   |
| count         | integer           | The number of elements in the collection.                             | weblement\collections\CollectionObject    |
| elements      | array             | The elements that belong to the collection.                           | weblement\collections\CollectionObject    |
| isEmpty       | boolean           | Whether this collection is empty.                                     | weblement\collections\CollectionObject    |
| isIndexed     | boolean           | Whether the collection is indexed and index of an element matters.    | weblement\collections\CollectionObject    |
| itereator     | ArrayIterator     | An iterator for traversing the cookies in the collection.             | weblement\collections\CollectionObject    |


#### Public Methods

| Method            | Description                                                                                               | Defined By                                |
|------------------ |--------------------------------------------------------------------------------------------------------   |----------------------------------------   |
| __call()          | Calls the named method which is not a class method.                                                       | weblement\collections\Object              |
| __construct()     | Constructor.                                                                                              | weblement\collections\CollectionObject    |
| __debugInfo()     | Returns the public properties of the collection for debugging.                                            | weblement\collections\Object              |
| __get()           | Returns the value of an object property.                                                                  | weblement\collections\Object              |
| __isset()         | Checks if a property is set, i.e. defined and not null.                                                   | weblement\collections\Object              |
| __set()           | Sets value of an object property.                                                                         | weblement\collections\Object              |
| __unset()         | Sets an object property to null.                                                                          | weblement\collections\Object              |
| [add()](#add)             | Add an element or multiple elements to the collection.                                                    | weblement\collections\CollectionObject    |
| canGetProperty()  | Returns a value indicating whether a property can be set.                                                 | weblement\collections\Object              |
| canSetProperty()  | Returns a value indicating whether a method is defined.                                                   | weblement\collections\Object              |
| className()       | Returns the fully qualified name of this class.                                                           | weblement\collections\Object              |
| clear()           | Removes all elements from the collection.                                                                 | weblement\collections\CollectionObject    |
| [complement()](#complement)      | Returns the difference between the collection and specified elements.                                     | weblement\collections\Set                 |
| contains()        | Checks whether the collection contains an element or multiple elements.                                   | weblement\collections\CollectionObject    |
| count()           | Returns the number of elements in the collection.                                                         | weblement\collections\CollectionObject    |
| getCount()        | Returns the number of elements in the collection.                                                         | weblement\collections\CollectionObject    |
| getElements()     | Returns an array with all the elements of the collection.                                                 | weblement\collections\CollectionObject    |
| getIsEmpty()      | Returns whether the collection is empty.                                                                  | weblement\collections\CollectionObject    |
| getIsIndexed()    | Returns whether the collection is indexed.                                                                | weblement\collections\CollectionObject    |
| getIterator()     | Returns an iterator for traversing the elements in the collection.                                        | weblement\collections\CollectionObject    |
| hasMethod()       | Returns a value indicating whether a method is defined.                                                   | weblement\collections\Object              |
| hasProperty()     | Returns a value indicating whether a property is defined.                                                 | weblement\collections\Object              |
| init()            | Initialize the collection.                                                                                | weblement\collections\Object              |
| [intersect()](#intersect)       | Checks and returns elements which are present in both the collection and a specified group of elements    | weblement\collections\Set                 |
| remove()          | Remove an element or multiple elements from the collection.                                               | weblement\collections\CollectionObject    |
| toArray()         | Returns an array with all the elements of the collection.                                                 | weblement\collections\CollectionObject    |
| [union()](#union)           | Merge the collection with a set of elements.                                                              | weblement\collections\Set                 |


#### Method Details

###### add()
```php
public function add($elements)
```
> Add elements to the collection.

|            |       |                                                                                                         |
|------------|-------|---------------------------------------------------------------------------------------------------------|
| $elements  | mixed | The elements to be added to the collection. See [[CollectionObject::add()]] for detailed documentation. |
| **return** | void  |                                                                                                         |
___

###### complement()
```php
public function complement($elements, $strict = false)
```
> Returns the difference between the collection and specified elements.

|            |         |                                                                                                                                         |
|------------|---------|-----------------------------------------------------------------------------------------------------------------------------------------|
| $elements  | mixed   | The elements that needs to be differentiated to.                                                                                        |
| $strict    | boolean | If the check should be strict (e.g. object types) or not.                                                                               |
| **return** | array   | The elements that are not part of the collection (i.e. the elements that completes the collection when union to the specified elements) |
___

###### union()
```php
public function union($elements, $strict = false)
```
> Returns an array of the collection elements with another set of elements

|            |         |                                                                                    |
|------------|---------|------------------------------------------------------------------------------------|
| $elements  | mixed   | The elements that will be added to the existing collection elements                |
| $strict    | boolean | If the check should be strict (e.g. object types) or not.                          |
| **return** | array   | An array of elements containing the elements of the set and the specified elements |
___

###### intersect()
```php
public function intersect($elements, $strict = false)
```
> Checks and returns elements which are present in both the collection and a specified group of elements

|            |         |                                                                                                   |
|------------|---------|---------------------------------------------------------------------------------------------------|
| $elements  | mixed   | The elements that should be checked against                                                       |
| $strict    | boolean | If the check should be strict (e.g. object types) or not.                                         |
| **return** | array   | An array of elements that are present in both the collection and the specified group of elements. |
___

## Examples

#### Creating Set Objects

```php
use weblement\collections\Set;

// create an empty set
$set = new Set();
// elements = {}

//create a set on an array
$set = new Set([1, 2, 3, 5, 5]);
// elements = {1, 2, 3, 5}

$set = new Set(['key1' => 'foo', 'key2' => bar]);
// elements = {'foo', 'bar'}

```

#### Adding elements to a Set
```php
use weblement\collections\Set;

$set = new Set([1, 2 ,3 ,5 ,5]);

// Adding a single element to the set
$set->add(10);
// elements = {1, 2, 3, 5, 10}
$set->add(3);
// elements = {1, 2, 3, 5, 10}
$set->add('foo');
// elements = {1, 2, 3, 5, 10, 'foo'}

// Adding multiple elements to the set
$set->add([1, 2, 11, 100, 35, 'foo' => 'bar']);
// elements = {1, 2, 3, 5, 10, 'foo', 11, 100, 35, 'bar'}
```

#### Complements: difference between the set and a group of elements

```php
use weblement\collections\Set;

$set = new Set([1, 2, 3, 5, 5]);

var_dump($set->complement([1, 2, 3, 4, 5, 6]));
// returns [4, 6]

var_dump($set->complement(['key1' => 'foo', 'key2' => 'bar']));
// returns ['foo', 'bar']

var_dump($set->complement(['3', 4, 5, '5', 10]));
// returns [4, 10]

// with strict comparison
var_dump($set->complement(['3', 4, 5, '5', 10], true));
// returns ['3', 4, '5', 10]

// complements another Set or an object that is Traversable
$set2 = new Set([0, 5, 10, 15, 20]);
var_dump($set->complement($set2));
// returns [0, 10, 15, 20]
```

#### Intersection of the set and a group of elements

```php
use weblement\collections\Set;

$set = new Set([1, 2, 3, 5, 5]);

var_dump($set->intersect([0, 5, 10, 15, 20]));
// returns [5]

// can be used on arrays and [[Traversable]] objects with or without `strict` mode
```

#### Union of the set and a group of elements

```php
use weblement\collections\Set;

$set = new Set([1, 2, 3, 5, 5]);

var_dump($set->union([0, 5, 10, 15, 20]));
// returns [1, 2, 3, 5, 0, 10, 15, 20]

// can be used on arrays and [[Traversable]] objects with or without `strict` mode
```
