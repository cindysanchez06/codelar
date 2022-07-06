# Codelar
`git clone https://github.com/cindysanchez06/codelar`

## requisitos
- php >= 7.2.0
- composer
- symfony

## Instalacion de paquetes y dependencias
### server 
- `composer install` para instalar dependencias de PHP
- `php bin/console doctrine:database:create` (para crear la bd)
- `php bin/console doctrine:schema:update --force` para crear las entidades o tablas en bd


## Ejecucion en local
### Para levantar el sevidor
- `symfony server:start` si cuenta con symfony cli
- `php -S localhost:8000 -t public/` si no cuenta con symfony cli


###
- las tecnologias que se utilizaron son:
- php >= 7.2.0
- symfony en su version 5.4


By Cindy Sanchez
