## DavidRest

DavidRest es un ejemplo de práctica de integración de VueJS y un API REST desarrollado en Lumen MicroFramework (PHP)

## Descripción del Uso

- El proyecto sigue en modo de desarrollo, por ende se debe levantar los servicios de tal forma
- El SPA en modo dev, no genera el build necesario para compilar un solo archivo CSS (ademas del soporte nativo de SASS)
- Lumen es un MicroFramework de Laravel, deben crear una BD y correr las migraciones y los seeders para generar dummy data

## Instalación

## Lumen 5.5 MicroFramework

``` bash
# install dependencies
composer install

# start php built in server 
php -S localhost:8000 -t public

# create a local DB (using phpmyadmin)

# run db migrations and seeds
php artisan migrate
php artisan db:seed
```
```

## VueJS Webpack-simple Template

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build
```

## Créditos
[David E Lares S](https://davidlares.com)

## Licencia
[MIT](https://opensource.org/licenses/MIT)
