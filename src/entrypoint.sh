#!/bin/bash

echo "🔧 Fixing Laravel + Node permissions..."

APP_DIR=/var/www

# Set ownership
chown -R www-data:www-data $APP_DIR

# Basic permissions
find $APP_DIR -type f -exec chmod 644 {} \;
find $APP_DIR -type d -exec chmod 755 {} \;

# Laravel-specific writable dirs
chmod -R 775 $APP_DIR/storage
chmod -R 775 $APP_DIR/bootstrap/cache




# Ensure log file exists
touch $APP_DIR/storage/logs/laravel.log
chmod 664 $APP_DIR/storage/logs/laravel.log

# Composer & Node deps (if exist)
[ -d "$APP_DIR/vendor" ] && chmod -R 775 $APP_DIR/vendor
[ -d "$APP_DIR/node_modules" ] && chmod -R 775 $APP_DIR/node_modules

# Laravel migrations, caches etc (optional)
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Run the default CMD
exec "$@"
