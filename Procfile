web: composer install --no-dev --optimize-autoloader && \
     php artisan key:generate --ansi && \
     php artisan migrate --force && \
     php artisan config:cache && \
     php artisan route:cache && \
     php artisan view:cache && \
     php artisan serve && \
     php artisan storage:link
