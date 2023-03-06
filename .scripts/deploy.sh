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

#clear Cache
php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan view:clear


# Re-generate app key
php artisan key:generate

# Install npm dependencies
echo "Install npm dependencies"
# npm ci --prefer-offline --no-audit
npm i

# Run database migrations
php artisan migrate --force

# Note: If you're using queue workers, this is the place to restart them.
# TODO restart queue workers.

# Clear the old cache
php artisan clear-compiled

# update composer
echo "composer Update"
composer update

#run build
echo "Compile assets for production"
npm run build

# Recreate cache
php artisan optimize

# Compile npm assets
#npm run prod

# Reload PHP to update opcache
echo "" | sudo -S service php8.1-fpm reload

# Reload redis-server to update cache.
sudo service redis-server restart

composer update

# Exit maintenance mode.
php artisan up
echo "Deployment finished!"
