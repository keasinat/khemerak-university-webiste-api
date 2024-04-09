

## First setup before run

```bash
cp .env.example .env
set APP_URL 
```
## Update DB external ENV
```bash
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

```

## link storage of file manager
RUN
```bash
php artisan storage:link
php artisan vendor:publish --tag=fm-assets
```
