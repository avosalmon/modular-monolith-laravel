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

Start docker compose
```sh
docker compose up -d
```

Install composer dependencies
```sh
docker compose exec app composer install
```

Generate app key and places inside the .env file
```sh
docker compose exec app php artisan key:generate
```

Run DB migration
```sh
docker compose exec app php artisan migrate:fresh --seed
```

Now you can access the app via http://localhost.

To stop Docker containers
```sh
docker compose down
```

#### Laravel Sail command (optional)

This repository uses [Laravel Sail](https://laravel.com/docs/9.x/sail) for the local docker environment. You can use the `sail` command by configuring a bash alias below.
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

The `sail` command is an shortcut for `docker compose exec app php` which runs a given command within the docker container. The `docker compose` commands in the previous section can be shortened like this.

```sh
sail composer install
sail artisan key:generate
sail artisan migrate:fresh --seed
```

## Testing
This repository uses [Pest](https://pestphp.com/) for writing tests. Pest is a testing framework with a simpler syntax like [Jest](https://jestjs.io/) and better reporting. Since it's powered by PHPUnit, it supports all the PHPUnit syntaxes as well.

### Running tests

```sh
sail test
```

### Filtering tests

```sh
sail test --filter OrderControllerTest
```

### Display code coverage

```sh
sail test --coverage --min=80
```

## Static code analysis to enforce domain boundaries
[Deptrac](https://github.com/qossmic/deptrac) is a static code analysis tool for PHP that helps you define architectual layers over classes and rules on which layer can access which layer.

You can run `deptrac` with the command below.
```sh
sail exec app ./vendor/bin/deptrac
```

You can also visualize the dependency graph by exporting the analysis result as an image.
```sh
sail exec app ./vendor/bin/deptrac --formatter=graphviz-image --output="./deptrac.png"
```
