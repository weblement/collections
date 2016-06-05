# Indexable

Some collection can be indexed using a key-value pair. This contains the implementation of indexable collections and should be used by all collections that needs to be indexed.

## API Documentation

#### Trait weblement\collections\Indexable
|                    |                                                                                                                                      |
|--------------------|--------------------------------------------------------------------------------------------------------------------------------------|
| **Implemented By** | weblement\collections\ArrayList, weblement\collections\Map, weblement\collections\Queue, weblement\collections\Stack                                                                                               |
| **Source Code**    | https://github.com/weblement/collections/blob/master/src/Indexable.php                                                              |

#### Public Methods
| Method | Description | Defined By |
|--------|-------------|------------|
| [getElementAt()](#getelementat) | Retrieves an element from the collection by a specified index. | weblement\collections\Indexable |
| [getIndexOf()](#getindexof) | Looks for the index of an element from the collection and returns it. | weblement\collections\Indexable |
| [getIsIndexed()](#getisindexed) | Describes if the collection is indexed or not | weblement\collections\Indexable |
| [hasIndex()](#hasindex) | Checks if the collection contains an index. | weblement\collections\Indexable |
| [removeIndex()](#removeindex) | Remove the index and it's associated element from the collection | weblement\collections\Indexable |


#### Method Details

###### getElementAt()
```php
public mixed getElementAt($index, $defaultValue = null)
```
> Retrieves an element from the collection by a specified index.  
> If the index does not exist, the default value will be returned.  

||||
|----|------|------|
| $index | string|integer|Closure | The index of the element or an anonymous function returning the value. |
| $defaultValue | mixed | The default value to return if the index specified does not exist |
| **return**| mixed | The element at the specified index if found, otherwise the default value |
___

###### getIndexOf()
```php
public mixed getIndexOf($element, $last = false, $defaultValue = null)
```
> Looks for the index of an element from the collection and returns it. The default value  
> will be returned if the element does not exist.

||||
|----|------|------|
| $element | mixed | The element whose index should be retrieved |
| $last | boolean | Whether to start looking from the end (last element added) of the collection |
| $defaultValue | mixed | The default value to return if the element does not exist |
| **return** | mixed | The index of the element |
___

###### getIsIndexed()
```php
public boolean getIsIndexed()
```
> Describes if the collection is indexed or not  
> Child classes should override this method if the elements should be indexed.  
> In this case, `true` should always be returned as the collection will be indexed  

||||
|----|------|------|
| **return** | true |  |
___

###### hasIndex()
```php
public boolean hasIndex($index, $caseSensitive = true)
```
> Checks if the collection contains an index or multiple indexes.

||||
|----|------|------|
| $index | mixed| The index (key) to look for |
| $caseSensitive | Whether the comparison should be case sensitive. ||
| **return** | true | Whether the collection contain the specified index |
___

###### removeIndex()
```php
public void removeIndex($index)
```
> Remove the index and it's associated element from the collection  
> This is done by removing the index in an array copy of the collection, then the elements  
> are overridden by the modified array copy

||||
|----|------|------|
| $index | mixed| The index to be removed from the collection |
| **return** | void |  |
