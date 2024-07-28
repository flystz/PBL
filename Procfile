web: composer install --no-dev --optimize-autoloader && \
     php artisan key:generate --ansi && \
     php artisan migrate --force && \
     php artisan config:cache && \
     php artisan route:cache && \
     php artisan view:cache && \
     php artisan serve --host=0.0.0.0 --port=8000 && \
     php artisan storage:link
     

