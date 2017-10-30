# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Curl/v/stable)](https://packagist.org/packages/josantonius/Curl) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Curl/v/unstable)](https://packagist.org/packages/josantonius/Curl) [![License](https://poser.pugx.org/josantonius/Curl/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/5137ab63729545d78f4a417075a6ce02)](https://www.codacy.com/app/Josantonius/PHP-Curl?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Curl&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Curl/downloads)](https://packagist.org/packages/josantonius/Curl) [![Travis](https://travis-ci.org/Josantonius/PHP-Curl.svg)](https://travis-ci.org/Josantonius/PHP-Curl) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Curl/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Curl)

[Versión en español](README-ES.md)

API Requests using the HTTP protocol through the Curl library.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [Exception Handler](#exception-handler)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Curl library**, simply:

    $ composer require Josantonius/Curl

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/Curl --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/Josantonius/PHP-Curl.git

Or **install it manually**:

[Download Curl.php](https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php

## Available Methods

Available methods in this library:

### - Make request and get response website:

```php
Curl::request($url, $params, $result);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $url | Url when get content. | string | Yes | |

| Attribute | Key | Description | Type | Required | Default
| --- | --- | --- | --- | --- | --- |
| $params | | Parameters. | array | No | array() |
| | 'referer' | The referrer URL. | string | No | |
| | 'timeout' | Timeout. | int | No | |
| | 'agent' | Useragent. | string | No | |
| | 'headers' | HTTP headers. | array | No | |
| | 'data' | Parameters to send. | array | No | |
| | 'type' | Type of request. | string | No | |

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $result | Returns result as array or object. | string | No | 'array' |

**# Return** (array|object) → response

## Quick Start

To use this class with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Curl.php';

use Josantonius\Curl\Curl;
```

## Usage

Example of use for this library:

### - Send GET request and obtain response as array:

```php
Curl::request('https://graph.facebook.com/zuck');
```

### - Send GET request and obtain response as object:

```php
Curl::request('https://graph.facebook.com/zuck', false, 'object');
```

### - Send GET request with params and obtain response as array:

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Send GET request with params and obtain response as object:

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Send POST request and obtain response as array:

```php
$data = [
    'type'    => 'post',
    'data'    => array('user' => '123456', 'password' => 'xxxxx'),
    'timeout' => 10,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Send POST request and obtain response as object:

```php
$data = [
    'type'    => 'post',
    'data'    => array('user' => '123456', 'password' => 'xxxxx'),
    'timeout' => 10,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Send PUT request and obtain response as array:

```php
$data = [
    'type'    => 'put',
    'data'    => array('email' => 'new@email.com'),
    'timeout' => 30,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Send PUT request and obtain response as object:

```php
$data = [
    'type'    => 'put',
    'data'    => array('email' => 'new@email.com'),
    'timeout' => 30,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Send DELETE request and obtain response as array:

```php
$data = [

    'type'    => 'delete',
    'data'    => ['userId' => 10],
    'timeout' => 30,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Send DELETE request and obtain response as object:

```php
$data = [
    'type'    => 'delete',
    'data'    => ['userId' => 10],
    'timeout' => 30,
    'referer' => 'http://' . $_SERVER['HTTP_HOST'],
    'headers' => [
        'Content-Type:application/json',
        'Authorization:0kdm3hzmb4h3cf',
    ],
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

## Tests 

To run [tests](tests) you just need [Composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/PHP-Curl.git
    
    $ cd PHP-Curl

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run all previous tests:

    $ composer tests

## Exception Handler

This library uses [exception handler](src/Exception) that you can customize.

## ☑ TODO

- [x] Create tests
- [x] Improve documentation

## Contribute

1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

## Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2016 - 2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).