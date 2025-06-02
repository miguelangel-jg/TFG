#!/usr/bin/env bash

php artisan migrate --force          # Ejecuta migraciones
php artisan storage:link              # Crea el enlace simbólico para storage
php artisan config:cache              # Cachea la configuración
php artisan route:cache               # Cachea rutas
php artisan view:cache                # Cachea vistas

php artisan serve --host=0.0.0.0 --port=$PORT
