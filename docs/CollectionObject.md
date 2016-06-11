# CollectionObject

The CollectionObject is an object that will represent a [Collection](https://github.com/weblement/collections/blob/master/docs/Collection.md)

## API Documentation

#### Abstract Class weblement\collections\CollectionObject
|                    |                                                                                                                                                                                                                     |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Extends**        | weblement\collections\Object                                                                                                                                                                                        |
| **Implements**     | [weblement\collections\Collection](https://github.com/weblement/collections/blob/master/docs/Collection.md)                                                                                                         |
| **Implemented By** | weblement\collections\ArrayList, weblement\collections\Map, weblement\collections\Queue, [weblement\collections\Set](https://github.com/weblement/collections/blob/master/docs/Set.md), weblement\collections\Stack |
| **Source Code**    | https://github.com/weblement/collections/blob/master/src/CollectionObject.php                                                                                                                                       |

#### Public Properties

| Property  | Type          | Description                                                        | Defined By                             |
|-----------|---------------|--------------------------------------------------------------------|----------------------------------------|
| count     | integer       | The number of elements in the collection.                          | weblement\collections\CollectionObject |
| elements  | array         | The elements that belong to the collection.                        | weblement\collections\CollectionObject |
| isEmpty   | boolean       | Whether this collection is empty.                                  | weblement\collections\CollectionObject |
| isIndexed | boolean       | Whether the collection is indexed and index of an element matters. | weblement\collections\CollectionObject |
| itereator | ArrayIterator | An iterator for traversing the cookies in the collection.          | weblement\collections\CollectionObject |


#### Public Methods

| Method                          | Description                                                             | Defined By                             |
|---------------------------------|-------------------------------------------------------------------------|----------------------------------------|
| __call()                        | Calls the named method which is not a class method.                     | weblement\collections\Object           |
| [__construct()](__construct)    | Constructor.                                                            | weblement\collections\CollectionObject |
| __debugInfo()                   | Returns the public properties of the collection for debugging.          | weblement\collections\Object           |
| __get()                         | Returns the value of an object property.                                | weblement\collections\Object           |
| __isset()                       | Checks if a property is set, i.e. defined and not null.                 | weblement\collections\Object           |
| __set()                         | Sets value of an object property.                                       | weblement\collections\Object           |
| __unset()                       | Sets an object property to null.                                        | weblement\collections\Object           |
| [add()](#add)                   | Add an element or multiple elements to the collection.                  | weblement\collections\CollectionObject |
| canGetProperty()                | Returns a value indicating whether a property can be set.               | weblement\collections\Object           |
| canSetProperty()                | Returns a value indicating whether a method is defined.                 | weblement\collections\Object           |
| className()                     | Returns the fully qualified name of this class.                         | weblement\collections\Object           |
| [clear()](#clear)               | Removes all elements from the collection.                               | weblement\collections\CollectionObject |
| [contains()](#contains)         | Checks whether the collection contains an element or multiple elements. | weblement\collections\CollectionObject |
| [count()](#count)               | Returns the number of elements in the collection.                       | weblement\collections\CollectionObject |
| [getCount()](#getcount)         | Returns the number of elements in the collection.                       | weblement\collections\CollectionObject |
| [getElements()](#getelements)   | Returns an array with all the elements of the collection.               | weblement\collections\CollectionObject |
| [getIsEmpty()](#getisempty)     | Returns whether the collection is empty.                                | weblement\collections\CollectionObject |
| [getIsIndexed()](#getisindexed) | Returns whether the collection is indexed.                              | weblement\collections\CollectionObject |
| [getIterator()](#getiterator)   | Returns an iterator for traversing the elements in the collection.      | weblement\collections\CollectionObject |
| hasMethod()                     | Returns a value indicating whether a method is defined.                 | weblement\collections\Object           |
| hasProperty()                   | Returns a value indicating whether a property is defined.               | weblement\collections\Object           |
| init()                          | Initialize the collection.                                              | weblement\collections\Object           |
| [remove()](#remove)             | Remove an element or multiple elements from the collection.             | weblement\collections\CollectionObject |
| [toArray()](#toarray)           | Returns an array with all the elements of the collection.               | weblement\collections\CollectionObject |


#### Method Details

###### __construct()
```php
public void __construct($elements = [], $config = [])
```
> Construct the collection object with an array of elements.

> The `add()` method of the collection instance will be used to add the elements to the collection.

|            |       |                                                                        |
|------------|-------|------------------------------------------------------------------------|
| $elements  | array | The initial elements that will be part of the collection               |
| $config    | array | Name-value pairs that will be used to initialize the object properties |
| **return** | void  |                                                                        |
___

###### add()
```php
public void add($elements)
```
> Add an element or multiple elements to the collection.  
> The default implementation allows you to add one or multiple elements (specified as an array)  
>   
> For non-indexed collection, `getIsIndexed() === false`   
>   
> To append one element at the end of the collection, simply use:  
> `$collection->add('a')` or `$collection->add(['a'])`  
>   
> To add multiple elements use:  
> `$collection->add(['a', 'b', 'c'])`  
>   
> To add the elements from another Collection (CollectionObject) use:  
> `$collection->add($collection2->elements)`  
>   
> To add a Collection itself to the elements:  
> `$collection->add($collection2)` or `$collection->add([$collection2])`  
>   
> To append an array to the collection  
> `$collection->add([['a', 'b', 'c']])`  
>   
> To append multiple arrays, just add them to the array parameter:   
> `$collection->add([['a', 'b', 'c'], ['d', 'e', 'f']])`  
>  
>   
> For indexed collection `getIsIndexed() === true`   
>   
> To append one element at the end of the collection, use:  
> `$collection->add('a')`  
>   
> To add an element at a specific index, pass the element using an array where the key is the index:  
> `$collection->add(['key' => 'value'])`  
> This will override the existing element at the specified index.  
>   
> To add an array or another collection to an index, just add it to the value:  
> `$collection->add(['key' => $collection])`, `$collection->add(['key' => ['a', 'b', 'c']])`  
>   
> To add multiple arrays or collections, add them to the array:  
> `$collection->add(['key1' => ['a', 'b', 'c'], 'key2' => ['d', 'e', 'f']])`  

|            |       |                                             |
|------------|-------|---------------------------------------------|
| $elements  | mixed | The elements to be added to the collection. |
| **return** | void  |                                             |
___

###### clear()
```php
public abstract void clear()
```
> Removes all elements from the collection.

|            |      |   |
|------------|------|---|
| **return** | void |   |
___

###### contains()
```php
public abstract void contains($elements, $strict = false)
```
> Checks if an element / multiple elements is / are in the collection  
>   
> Checking a single element:  
> `$value = ...` can be anything but an array:  
> `$collection->contains($value)`  
>   
> Check if collection contains multiple values:  
> `$values = ['a', 'b', 'c']`;  
> `$collection->contains($values)`  
>  
> Check if collection contains an array:  
> `$array = ['a', 'b', 'c']`;  
> `$collection->contains([$array])`  
>  
> Check if collection contains the elements from another collection `$c`  
> `$collection->contains($c->elements)`  
>  
> Check if collection contains another collection `$c`  
> `$collection->contains($c)`  
>  
> When using `$strict`, strict comparison will be done  
> i.e. `'123' !== 123`, `123 === 123`  
> When `$strict` is false, `'123' == 123`  
>  
> If looking for an object in the collection, strict will always be true even if speficied as false  

|            |         |                                                                                                                  |
|------------|---------|------------------------------------------------------------------------------------------------------------------|
| $elements  | mixed   | The elements to be removed from the collection                                                                   |
| $strict    | boolean | if the check should be strict (i.e. use ===). If the element specified is an object, strict will always be true. |
| **return** | void    |                                                                                                                  |
___

###### count()
```php
public abstract int count()
```
> Returns the number of elements in the collection.  
> This method is required by the SPL `Countable` interface.  
> It will be implicitly called when you use `count($collection)`.  

|            |     |                                           |
|------------|-----|-------------------------------------------|
| **return** | int | The number of elements in the collection. |
___

###### getCount()
```php
public abstract int getCount()
```
> Returns the number of elements in the collection.

|            |     |                                           |
|------------|-----|-------------------------------------------|
| **return** | int | The number of elements in the collection. |
___

###### getElements()
```php
public abstract array getElements()
```
> Returns the number of elements in the collection.

|            |       |                                |
|------------|-------|--------------------------------|
| **return** | array | The elements of the collection |
___

###### getIsEmpty()
```php
public abstract boolean getIsEmpty()
```
> Check if the collection contains elements and returns true if it's empty

|            |         |                                 |
|------------|---------|---------------------------------|
| **return** | boolean | Whether the collection is empty |
___

###### getIsIndexed()
```php
public abstract boolean getIsIndexed()
```
> Describes if the collection is indexed or not.  
> Child classes should override this method if the elements should be indexed.  

|            |         |                                          |
|------------|---------|------------------------------------------|
| **return** | boolean | Whether the collection is indexed or not |
___

###### getIterator()
```php
public abstract Traversable getIterator()
```
> Retrieve an external iterator

|            |             |                        |
|------------|-------------|------------------------|
| **return** | Traversable | A Traversable iterator |
___

###### remove()
```php
public abstract void remove($elements, $strict = false, $last = true)
```
> Removes the first occurence of the element from the collection starting from the last added element.

|            |         |                                                                                                                  |
|------------|---------|------------------------------------------------------------------------------------------------------------------|
| $elements  | mixed   | The elements to be removed from the collection                                                                   |
| $strict    | boolean | If the check should be strict (i.e. use ===). If the element specified is an object, strict will always be true. |
| $last      | boolean | whether to remove the element starting from the last element in the collection                                   |
| **return** | void    |                                                                                                                  |
___

###### toArray()
```php
public abstract array toArray()
```
> Returns an array that contains all the elements of the collection.

|            |       |                                                                 |
|------------|-------|-----------------------------------------------------------------|
| **return** | array | An array containing all the elements present in the collection. |

