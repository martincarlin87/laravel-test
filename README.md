## Structure

This app places models in `App\Models`.

https://medium.com/@codingcave/organizing-your-laravel-models-6b327db182f9

## Setup

The docker setup is from this Digital Ocean blog post:

https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose

### Composer

Using locally installed composer:

```
composer install
```

or using Docker:

```
docker run --rm -v $(pwd):/app composer install
```

### Genereate App Key

```
docker-compose exec app php artisan key:generate
```

### Cache Config

```
docker-compose exec app php artisan config:cache
```

### Run Migrations

```
docker-compose exec app php artisan migrate
```

### Create Migration

```
docker-compose exec app php artisan make:migration create_players_table
```

### Create Seeder

```
docker-compose exec app php artisan make:seeder TeamSeeder
```

### Run Seeder

```
docker-compose exec app php artisan db:seed --class=PositionSeeder
docker-compose exec app php artisan db:seed --class=TeamSeeder
docker-compose exec app php artisan db:seed --class=GameSeeder
````

or, to run all at once:

```
docker-compose exec app php artisan db:seed
```


### Create Model

```
docker-compose exec app php artisan make:model Player
```

### Create Command

```
docker-compose exec app php artisan make:command DeleteFiles
```

### Cache Routes

```
docker-compose exec app php artisan route:cache
```
