[PHP 7+]: (http://php.net)
[Composer]: (https://getcomposer.net)
[MongoDB]: (https://www.mongodb.org)
[ElasticSearch]: (https://www.elastic.co/products/elasticsearch)

APHA
====

[![Build Status](https://travis-ci.org/martyn82/apha.svg?branch=master)](https://travis-ci.org/martyn82/apha)
[![Latest Stable Version](https://poser.pugx.org/martyn82/apha/v/stable)](https://packagist.org/packages/martyn82/apha) [![Total Downloads](https://poser.pugx.org/martyn82/apha/downloads)](https://packagist.org/packages/martyn82/apha) [![Latest Unstable Version](https://poser.pugx.org/martyn82/apha/v/unstable)](https://packagist.org/packages/martyn82/apha) [![License](https://poser.pugx.org/martyn82/apha/license)](https://packagist.org/packages/martyn82/apha)

APHA is a CQRS/ES library for PHP. It contains all the building blocks
you need to build an application that implements Command-Query Responsibility
Segregation either with or without Event Sourcing.

APHA provides:
* Typed command and event handling with annotations
* Using MongoDB as event store and/or read store
* Using ElasticSearch as read store
* Replay of events
* Sagas
* Event scheduling (experimental)

## Prerequisites

Requirements:
* [PHP 7+]
* [Composer]

Optional:
* [MongoDB]
* [ElasticSearch]

## Installation

```
$ composer install
```

## Usage

Run the tests:
```
$ bin/phing test:unit
```

Use in your own project:
```
$ composer require martyn82/apha:~0.1
```

## Documentation

Currently, there is no API documentation available. Coming soon!

## Examples

Some quickstart examples are available in the `examples` directory.
You can run them from the command-line by executing:

```
$ php examples/ ...
```

## Licensing
Please consult the file named `LICENSE` in the root of the project.
