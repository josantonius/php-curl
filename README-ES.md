# PHP Curl library

[![Latest Stable Version](https://poser.pugx.org/josantonius/curl/v/stable)](https://packagist.org/packages/josantonius/curl) [![Total Downloads](https://poser.pugx.org/josantonius/curl/downloads)](https://packagist.org/packages/josantonius/curl) [![Latest Unstable Version](https://poser.pugx.org/josantonius/curl/v/unstable)](https://packagist.org/packages/josantonius/curl) [![License](https://poser.pugx.org/josantonius/curl/license)](https://packagist.org/packages/josantonius/curl)

[English version](README.md)

Librería PHP para hacer peticiones HTTP a través de CURL. Fácil integración con API REST.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Manejador de excepciones](#manejador-de-excepciones)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Curl library, simplemente escribe:

    $ composer require Josantonius/Curl

El comando anterior solamente instalará los archivos necesarios, si prefieres descargar todo el código, incluyendo tests, puedes utilizar:

    $ composer require Josantonius/Curl --prefer-source

También puedes clonar el repositorio completo con Git:

    $ git clone https://github.com/Josantonius/PHP-Curl.git

### Requisitos

Esta ĺibrería es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar esta librería, simplemente:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;
```
### Métodos disponibles

Métodos disponibles en esta librería:

```php
Curl::request();
Curl::getUrl();
```
### Uso

Ejemplo de uso para esta librería:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Curl\Curl;

$data = [
    'url'       => 'https://graph.facebook.com/zuck',
    'type'      => 'post',
    'data'      => array('user' => '123456', 'password' => 'xxxxx'),
    'timeout'   => 10,
    'referer'   => 'http://'.$_SERVER['HTTP_HOST'],
    'headers'   => [
        'Content-Type:application/json', 
        'Authorization:0kdm3hzmb4h3cf'
    ]
];

echo "<pre>"; var_dump(Curl::request($data)); echo "</pre>";
```

### Tests 

Para utilizar la clase de [pruebas](tests), simplemente:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Curl\\Tests\\', __DIR__ . '/vendor/josantonius/curl/tests');

use Josantonius\Curl\Tests\CurlTest;
```
Métodos de prueba disponibles en esta librería:

```php
CurlTest::testGetRequest();
CurlTest::testPostRequest();
CurlTest::testPutRequest();
CurlTest::testDeleteRequest();
CurlTest::testResponseError();
CurlTest::testUnknownTypeError();
```

### Manejador de excepciones

Esta librería utiliza [control de excepciones](src/Exception) que puedes personalizar a tu gusto.
### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).