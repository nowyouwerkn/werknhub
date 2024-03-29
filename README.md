<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/nowyouwerkn/werknhub">
    <img src="images/logo.png" alt="Logo" width="260">
  </a>

  <h3 align="center">Werkn Hub</h3>

  <p align="center">
    Este es el sistema centralizados de 
    <br />
    <a href="https://github.com/nowyouwerkn/werknhub"><strong>Lee la documentación »</strong></a>
    <br />
    <br />
    <a href="https://github.com/nowyouwerkn/werknhub/issues">Reportar Problema</a>
    ·
    <a href="https://github.com/nowyouwerkn/werknhub/issues">Solicitar Funcionalidad</a>
  </p>
</p>


<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h5 style="display: inline-block">Indice de Contenido</h5></summary>
  <ol>
    <li>
      <a href="#acerca-del-proyecto">Acerca del Proyecto</a>
      <ul>
        <li><a href="#tecnologías">Tecnologías</a></li>
      </ul>
    </li>
    <li>
      <a href="#comenzado">Comenzando</a>
      <ul>
        <li><a href="#pre-requisitos">Pre-requisitos</a></li>
        <li><a href="#instalación">Instalación</a></li>
      </ul>
    </li>
    <li><a href="#uso">Uso</a></li>
    <ul>
      <li><a href="#facebookevents">Configurando Eventos de Facebook</a></li>
    </ul>
    <li><a href="#personalizar">Personalizar</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contirbuir</a></li>
    <li><a href="#licencia">Licencia</a></li>
    <li><a href="#contacto">Contacto</a></li>
    <li><a href="#agradecimientos">Agradecimientos</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## Acerca del Proyecto

[![Product Name Screen Shot][product-screenshot]](https://werkn.mx/werknhub)

### Tecnologías

* [Laravel](https://laravel.com)

<!-- GETTING STARTED -->
## Comenzando

### Pre-requisitos

* PHP: `^7.4\|^8.0`
* Laravel: `8.*`

### Instalación

Para comenzar a usar este paquete debes usar el siguiente comando para agregarlo a tu instalación de Laravel.
```
composer require nowyouwerkn/werknhub
```
Es necesario agregar proveedores al proyecto para poder utilizar todas las funciones de las librerias utilizadas por el paquete. Esto se agrega en el archivo `config/app.php` 

```
'providers' => [
    // ...
    Nowyouwerkn\WeCommerce\WerknHubServiceProvider::class,
    Intervention\Image\ImageServiceProvider::class,
];

'aliases' => [
    // ...
    'Image' => Intervention\Image\Facades\Image::class
];
```

Publica todos los assets del paquete y sus dependencias usando
```
php artisan vendor:publish --provider="Nowyouwerkn\WerknHub\WerknHubServiceProvider" --force
```
Para que funcione correctamente el sistema es OBLIGATORIO publicar los archivos de `migrations`, `seeders`, `theme`, `public` y `config`.


Limpia el caché de tu configuración
```
php artisan optimize:clear
#o
php artisan config:clear
```

El sistema necesita utilizar la ruta "/" que usa Laravel como vista de ejemplo en las rutas. Accede al documento `web.php` de tu proyecto de Laravel y sobreescribe la información con el archivo que se encuentra aqui: `https://github.com/nowyouwerkn/wecommerce/blob/main/src/routes.php`. Al realizarlo podrás usar.
```
php artisan serve
```
para prender tu servidor y acceder a `/instalador` para comenzar la instalación. Si estás usando Homestead no es necesario usar `php artisan serve`.

Si prefieres preparar manualmente el proyecto sigue los siguientes comandos.

```
php artisan migrate
php artisan db:seed
```

## Uso


## Roadmap

Revisa los [tickets abiertos](https://github.com/nowyouwerkn/werknhub/issues) para una lista estructurada de las funcionalidades propuestas y problemas conocidos en producción.

<!-- LICENCE -->
## Licencia

MIT License

Copyright (c) [2021] [Werkn S.A de C.V]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

<!-- CONTACT -->
## Contacto

Werkn S.A de C.V - [@nowyouwerkn](https://instagram.com/nowyouwerkn) - hey@werkn.mx
Link de Proyecto: [https://github.com/nowyouwerkn/werknhub](https://github.com/nowyouwerkn/werknhub)


<!-- ACKNOWLEDGEMENTS -->
## Agradecimientos
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)


<!-- MARKDOWN LINKS & IMAGES -->
[product-screenshot]: images/screenshot.png
