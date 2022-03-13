# Modular Monolith Laravel
The sample e-commerce application for Laracon Online Winter 2022.
- [Laracon Video](https://youtu.be/0Rq-yHAwYjQ?t=4070)
- [Slides](https://speakerdeck.com/avosalmon/modularising-the-monolith-laracon-online-winter-2022)

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

## Static code analysis for domain boundaries
[Deptrac](https://github.com/qossmic/deptrac) is a static code analysis tool for PHP that helps you define architectual layers over classes and rules on which layer can access which layer.

You can run `deptrac` with the command below.
```sh
sail exec app deptrac
```

You can also visualize the dependency graph by exporting the analysis result as an image.
```sh
sail exec app deptrac --formatter=graphviz-image --output="./deptrac.png"
```
