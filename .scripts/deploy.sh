#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Pull the latest version of the app
git fetch origin development
git reset --hard origin/development

# Install composer dependencies
echo "Install composer dependencies"
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Re-generate app key
php artisan key:generate

# Install npm dependencies
echo "Install npm dependencies"
npm ci --prefer-offline --no-audit

echo "Compile assets for production"
npm run production

# Run database migrations
php artisan migrate --force

# Note: If you're using queue workers, this is the place to restart them.
# TODO restart queue workers

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
npm run prod

# Reload PHP to update opcache
echo "" | sudo -S service php8.1-fpm reload

# Reload redis-server to update cache
sudo service redis-server restart
 
# Exit maintenance mode
php artisan up

echo "Deployment finished!" 