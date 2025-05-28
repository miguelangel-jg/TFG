#!/bin/bash

# Generar key si no existe
if [ ! -f /var/www/html/.env ]; then
  cp /var/www/html/.env.example /var/www/html/.env
fi

php artisan key:generate

# Ejecutar migraciones (espera a que la DB esté lista)
php artisan migrate --force

# Finalmente, arranca Apache en primer plano
apache2-foreground
