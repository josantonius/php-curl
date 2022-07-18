# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/curl/v/stable)](https://packagist.org/packages/josantonius/curl)
[![License](https://poser.pugx.org/josantonius/curl/license)](LICENSE)

[Versión en español](README-ES.md)

API Requests using the HTTP protocol through the Curl library.

> This was a very basic option for using cURL.
> The use of [Guzzle](https://github.com/guzzle/guzzle) is recommended.
---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [Sponsor](#Sponsor)
- [License](#license)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Curl library**, simply:

    composer require Josantonius/Curl

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    composer require Josantonius/Curl --prefer-source

You can also **clone the complete repository** with Git:

    git clone https://github.com/Josantonius/PHP-Curl.git

Or **install it manually**:

[Download Curl.php](https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php):

    wget https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php

## Available Methods

Available methods in this library:

### - Make request and get response website

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

### - Send GET request and obtain response as array

```php
Curl::request('https://graph.facebook.com/zuck');
```

### - Send GET request and obtain response as object

```php
Curl::request('https://graph.facebook.com/zuck', false, 'object');
```

### - Send GET request with params and obtain response as array

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Send GET request with params and obtain response as object

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Send POST request and obtain response as array

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

### - Send POST request and obtain response as object

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

### - Send PUT request and obtain response as array

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

### - Send PUT request and obtain response as object

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

### - Send DELETE request and obtain response as array

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

### - Send DELETE request and obtain response as object

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

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    git clone https://github.com/Josantonius/PHP-Curl.git
    
    cd PHP-Curl

    composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    composer phpmd

Run all previous tests:

    composer tests

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2016-2022, [Josantonius](https://github.com/josantonius#contact)
