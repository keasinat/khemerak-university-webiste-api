

## First setup before run

```bash
cp .env.example .env
# set app url of service: example edf-backend.localhost:9090
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
## Migration
Runing migration

```bash
php artisan migrate
php artisan db:seed
```

## User Login 
```bash
User: admin@admin.com
pwd: secret
```
## Docker run

```bash
docker-compose up -d --build --force-recreate
```
