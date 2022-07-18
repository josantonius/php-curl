# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/curl/v/stable)](https://packagist.org/packages/josantonius/curl)
[![License](https://poser.pugx.org/josantonius/curl/license)](LICENSE)

[English version](README.md)

Biblioteca PHP para hacer peticiones HTTP a través de CURL. Fácil integración con API REST.

> Esta era una opción muy básica para usar cURL.
> Se recomienda el uso de [Guzzle](https://github.com/guzzle/guzzle).
---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requisitos

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Curl library**, simplemente escribe:

    composer require Josantonius/Curl

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    composer require Josantonius/Curl --prefer-source

También puedes **clonar el repositorio** completo con Git:

    git clone https://github.com/Josantonius/PHP-Curl.git

O **instalarlo manualmente**:

[Descargar Curl.php](https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php):

    wget https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Realizar petición HTTP

```php
Curl::request($url, $params, $result);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $url | URL donde realizar la petición. | string | Yes | |

| Atributo | Clave | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- | --- |
| $params | | Parámetros. | array | No | array() |
| | 'referer' | URL de referencia. | string | No | |
| | 'timeout' | Tiempo de espera. | int | No | |
| | 'agent' | Useragent. | string | No | |
| | 'headers' | Encabezados HTTP. | array | No | |
| | 'data' | Parámetros para enviar. | array | No | |
| | 'type' | Tipo de petición. | string | No | |

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $result | Devuelve el resultado como array u objeto. | string | No | 'array' |

**# Return** (array|object) → respuesta

## Cómo empezar

Para utilizar esta clase con `Composer`:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;
```

Si la instalaste `manualmente`, utiliza:

```php
require_once __DIR__ . '/Curl.php';

use Josantonius\Curl\Curl;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Enviar petición GET y obtener respuesta como array

```php
Curl::request('https://graph.facebook.com/zuck');
```

### - Enviar petición GET y obtener respuesta como objeto

```php
Curl::request('https://graph.facebook.com/zuck', false, 'object');
```

### - Enviar petición GET con parámetros y obtener respuesta como array

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Enviar petición GET con parámetros y obtener respuesta como objeto

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Enviar petición POST y obtener respuesta como array

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

### - Enviar petición POST y obtener respuesta como objeto

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

### - Enviar petición PUT y obtener respuesta como array

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

### - Enviar petición PUT y obtener respuesta como objeto

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

### - Enviar petición DELETE y obtener respuesta como array

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

### - Enviar petición DELETE y obtener respuesta como objeto

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

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    git clone https://github.com/Josantonius/PHP-Curl.git
    
    cd PHP-Curl

    composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    composer phpmd

Ejecutar todas las pruebas anteriores:

    composer tests

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2016-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
