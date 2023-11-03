# Morele.net php dev test

## Start php container for app

Build container:

```shell
docker compose up -d
```

Login to the app container:

```shell
docker exec -it morele_php82 sh
```

Install composer dependencies:

```shell
composer install
```

## Run app tests

```shell
composer run-tests
```

## Stop containers

Stop containers:

```shell
docker compose stop
```

Stop & remove containers:

```shell
docker compose down
```
