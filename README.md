# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/curl/v/stable)](https://packagist.org/packages/josantonius/curl) [![Total Downloads](https://poser.pugx.org/josantonius/curl/downloads)](https://packagist.org/packages/josantonius/curl) [![Latest Unstable Version](https://poser.pugx.org/josantonius/curl/v/unstable)](https://packagist.org/packages/josantonius/curl) [![License](https://poser.pugx.org/josantonius/curl/license)](https://packagist.org/packages/josantonius/curl) [![Travis](https://travis-ci.org/Josantonius/PHP-Curl.svg)](https://travis-ci.org/Josantonius/PHP-Curl)

[Versión en español](README-ES.md)

API Requests using the HTTP protocol through the Curl library.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [Exception Handler](#exception-handler)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Curl library, simply:

    $ composer require Josantonius/Curl

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require Josantonius/Curl --prefer-source

Or you can also clone the complete repository with Git:

    $ git clone https://github.com/Josantonius/PHP-Curl.git

### Requirements

This library is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this class, simply:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;
```

### Available Methods

Available methods in this library:

```php
Curl::request();
```

### Usage

Example of use for this library:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;

$data = [

    'type'      => 'post',
    'data'      => array('user' => '123456', 'password' => 'xxxxx'),
    'timeout'   => 10,
    'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
    'headers'   => [

        'Content-Type:application/json', 
        'Authorization:0kdm3hzmb4h3cf'
    ]
];

$response = Curl::request('https://graph.facebook.com/zuck', $data);

echo "<pre>"; var_dump($response); echo "</pre>";
```

### Tests 

To run [tests](tests/Curl/Test) simply:

    $ git clone https://github.com/Josantonius/PHP-Curl.git
    
    $ cd PHP-Curl

    $ phpunit

### Exception Handler

This library uses [exception handler](src/Exception) that you can customize.

### ☑ TODO

- [x] Create tests
- [ ] Improve documentation

### Contribute

1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2016 - 2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).