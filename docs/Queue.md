#### Public Methods

| Method                      | Description                                                                                            | Defined By                             |
|-----------------------------|--------------------------------------------------------------------------------------------------------|----------------------------------------|
| __call()                    | Calls the named method which is not a class method.                                                    | weblement\collections\Object           |
| [__construct()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#__construct)               | Constructor.                                                                                           | weblement\collections\CollectionObject |
| __debugInfo()               | Returns the public properties of the collection for debugging.                                         | weblement\collections\Object           |
| __get()                     | Returns the value of an object property.                                                               | weblement\collections\Object           |
| __isset()                   | Checks if a property is set, i.e. defined and not null.                                                | weblement\collections\Object           |
| __set()                     | Sets value of an object property.                                                                      | weblement\collections\Object           |
| __unset()                   | Sets an object property to null.                                                                       | weblement\collections\Object           |
| [add()](#add)               | Add an element or multiple elements to the collection.                                                 | weblement\collections\CollectionObject |
| canGetProperty()            | Returns a value indicating whether a property can be set.                                              | weblement\collections\Object           |
| canSetProperty()            | Returns a value indicating whether a method is defined.                                                | weblement\collections\Object           |
| className()                 | Returns the fully qualified name of this class.                                                        | weblement\collections\Object           |
| [clear()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#clear)                     | Removes all elements from the collection.                                                              | weblement\collections\CollectionObject |
| [contains()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#contains)                  | Checks whether the collection contains an element or multiple elements.                                | weblement\collections\CollectionObject |
| [count()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#count)                     | Returns the number of elements in the collection.                                                      | weblement\collections\CollectionObject |
| [getCount()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#getcount)                  | Returns the number of elements in the collection.                                                      | weblement\collections\CollectionObject |
| [getElements()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#getelements)               | Returns an array with all the elements of the collection.                                              | weblement\collections\CollectionObject |
| [getIsEmpty()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#getisempty)                | Returns whether the collection is empty.                                                               | weblement\collections\CollectionObject |
| [getIsIndexed()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#getisindexed)              | Returns whether the collection is indexed.                                                             | weblement\collections\CollectionObject |
| [getIterator()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#getiterator)               | Returns an iterator for traversing the elements in the collection.                                     | weblement\collections\CollectionObject |
| hasMethod()                 | Returns a value indicating whether a method is defined.                                                | weblement\collections\Object           |
| hasProperty()               | Returns a value indicating whether a property is defined.                                              | weblement\collections\Object           |
| init()                      | Initialize the collection.                                                                             | weblement\collections\Object           |
| [peek()](#peek) | Returns the element at the top of the queue | weblement\collection\Queue |
| [pop()](#pop) | Remove and returns the element at the top of the queue | weblement\collection\Queue |
| [pos()](#pos) | Return the position of an element starting from the top of the queue | weblement\collection\Queue |
| [push()](#push) | Add an element to the queue | weblement\collection\Queue |
| [remove()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#remove)                    | Remove an element or multiple elements from the collection.                                            | weblement\collections\CollectionObject |
| [toArray()](https://github.com/weblement/collections/blob/master/docs/CollectionObject.md#toarray)                   | Returns an array with all the elements of the collection.                                              | weblement\collections\CollectionObject |


#### Method Details

###### peek()
```php
public function mixed peek()
```
> Returns the element at the top of the queue.

|            |        |                                                                |
|------------|--------|----------------------------------------------------------------|
| **return** | mixed  | the element at the top of the queue if any, otherwise `null`   |
___

#### Method Details

###### pop()
```php
public function mixed pop()
```
> Remove and returns the element at the top of the queue

|            |        |                                                                |
|------------|--------|----------------------------------------------------------------|
| **return** | mixed  | the element at the top of the queue if any, otherwise `null`   |
___


###### pos()
```php
public function int pos($element)
```
> Return the position of an element starting from the top of the queue.

|            |        |                                                        |
|------------|--------|--------------------------------------------------------|
| $element   | mixed  | the element to look for in the queue                   |
| **return** | int    | the position of the first element found in the queue   |
___

###### push()
```php
public function int push($element)
```
> Add an element to the queue.

|            |        |                                                        |
|------------|--------|----------------------------------------|
| $element   | mixed  | the element to be added to the queue   |
| **return** | void   |                                        |
___
