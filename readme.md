# Weblement Collection Library for PHP

[![Latest Stable Version](https://poser.pugx.org/weblement/collections/v/stable)](https://packagist.org/packages/weblement/collections) 
[![Total Downloads](https://poser.pugx.org/weblement/collections/downloads)](https://packagist.org/packages/weblement/collections) 
[![Latest Unstable Version](https://poser.pugx.org/weblement/collections/v/unstable)](https://packagist.org/packages/weblement/collections) 
[![License](https://poser.pugx.org/weblement/collections/license)](https://packagist.org/packages/weblement/collections)


Weblement [Collection](https://github.com/weblement/collections/blob/master/docs/Collection.md) is a library intended to make the manipulation of different data structures easier. This library adds a layer of abstraction to PHP's array which lets you to work with a specific type of data structure having functions intended for its purpose.


## Installation

The preferred way to install the library is through [composer](https://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist weblement/collections
```

or add
```json
{
    "require": {
        "weblement/collections": "*"
    }
}
```
to your `composer.json` file.


## About

The package requires PHP 5.4+ and follows the FIG standards PSR-1, PSR-2 and PSR-4 to ensure a high level of interoperability between shared PHP.

Current collections implemented are:
 - ArrayList
 - Map
 - Queue
 - [Set](https://github.com/weblement/collections/blob/master/docs/Set.md)
 - Stack
 

## Contributing
This library is open source package by [Weblement](https://github.com/weblement), and maintained by [Locustv2](https://github.com/Locustv2).

Feel free to report issues and make pull requests. Any help would be appreciated.

## License

This software is released under the [BSD 3-Clause](https://github.com/weblement/collections/blob/master/LICENSE) License.

Copyright © weblement 2016
