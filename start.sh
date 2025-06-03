#!/usr/bin/env bash

# Genera APP_KEY si no existe
if [ ! -f /var/www/storage/oauth-private.key ]; then
  php artisan key:generate
fi

# Ejecuta comandos necesarios
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
php artisan migrate --force

# Inicia el servidor
php artisan serve --host=0.0.0.0 --port=$PORT
