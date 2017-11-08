# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Curl/v/stable)](https://packagist.org/packages/josantonius/Curl) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Curl/v/unstable)](https://packagist.org/packages/josantonius/Curl) [![License](https://poser.pugx.org/josantonius/Curl/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/5137ab63729545d78f4a417075a6ce02)](https://www.codacy.com/app/Josantonius/PHP-Curl?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Curl&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Curl/downloads)](https://packagist.org/packages/josantonius/Curl) [![Travis](https://travis-ci.org/Josantonius/PHP-Curl.svg)](https://travis-ci.org/Josantonius/PHP-Curl) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Curl/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Curl)

[English version](README.md)

Biblioteca PHP para hacer peticiones HTTP a través de CURL. Fácil integración con API REST.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Curl library**, simplemente escribe:

    $ composer require Josantonius/Curl

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Curl --prefer-source

También puedes **clonar el repositorio** completo con Git:

    $ git clone https://github.com/Josantonius/PHP-Curl.git

O **instalarlo manualmente**:

[Descargar Curl.php](https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Curl/master/src/Curl.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Realizar petición HTTP:

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

### - Enviar petición GET y obtener respuesta como array:

```php
Curl::request('https://graph.facebook.com/zuck');
```

### - Enviar petición GET y obtener respuesta como objeto:

```php
Curl::request('https://graph.facebook.com/zuck', false, 'object');
```

### - Enviar petición GET con parámetros y obtener respuesta como array:

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data);
```

### - Enviar petición GET con parámetros y obtener respuesta como objeto:

```php
$data = [
    'timeout' => 10,
    'referer' => 'http://site.com',
];
        
Curl::request('https://graph.facebook.com/zuck', $data, 'object');
```

### - Enviar petición POST y obtener respuesta como array:

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

### - Enviar petición POST y obtener respuesta como objeto:

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

### - Enviar petición PUT y obtener respuesta como array:

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

### - Enviar petición PUT y obtener respuesta como objeto:

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

### - Enviar petición DELETE y obtener respuesta como array:

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

### - Enviar petición DELETE y obtener respuesta como objeto:

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

    $ git clone https://github.com/Josantonius/PHP-Curl.git
    
    $ cd PHP-Curl

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad
- [ ] Mejorar pruebas
- [ ] Mejorar documentación
- [ ] Refactorizar código

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/PHP-Curl/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).