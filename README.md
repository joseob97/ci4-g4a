# Games4All · Gestión de tienda de videojuegos con CodeIgniter 4

Proyecto académico en equipo (Universidad de Cádiz, 2024): aplicación web MVC con **CodeIgniter 4** para gestionar una tienda de videojuegos, sus usuarios y sus tarjetas de pago.

## Funcionalidades

- **Autenticación:** registro, inicio y cierre de sesión. Las rutas privadas están protegidas con filtros de CodeIgniter (`app/Filters`).
- **Usuarios:** listado, búsqueda, edición y borrado.
- **Tarjetas de pago:** listado y edición de las tarjetas de cada usuario.
- **Videojuegos:** alta, listado, edición y gestión del catálogo.

Rutas definidas en [`app/Config/Routes.php`](app/Config/Routes.php); controladores en [`app/Controllers`](app/Controllers) y vistas en [`app/Views`](app/Views).

## Tecnologías

PHP 8 · CodeIgniter 4 · MySQL · MVC · Composer

## Ejecución local

```bash
composer install
# Configura la base de datos MySQL en el archivo .env
php spark serve      # http://localhost:8080
```

> Proyecto relacionado: [G4A-Drupal](https://github.com/joseob97/G4A-Drupal), la misma tienda desarrollada con Drupal.
