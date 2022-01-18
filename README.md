# Modular Monolith Laravel

## System requirements
Docker is installed on your machine.

## Setup local environment

Copy example env file
```sh
cp .env.example .env
```

Install composer dependencies
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

This repository uses [Laravel Sail](https://laravel.com/docs/8.x/sail) for the local docker environment. You can use the `sail` command by configuring a bash alias below.
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Start docker containers
```sh
sail up -d
```

Generate app key and places inside the .env file
```sh
sail artisan key:generate
```

Run DB migration
```sh
sail artisan migrate:fresh --seed
```

Now you can access the app via http://localhost.

## Running tests

```sh
sail composer test
```
