#!/usr/bin/env bash

if [ -f ./.env ]; then
    source ./.env
    export APP_DEBUG=${APP_DEBUG:-false}
else
    echo ".env file not found." >&2
    exit 1
fi

if ! docker info > /dev/null 2>&1; then
    echo "Docker is not running." >&2
    exit 1
fi

if ! docker-compose -v > /dev/null 2>&1; then
    echo "docker-compose is not instaled." >&2
    exit 1
fi

docker-compose up -d

if [ ! -d "./vendor" ]; then
    docker-compose exec app composer install
fi

docker-compose exec app php artisan migrate --seed

if [ ! -d "./node_modules" ]; then
    docker-compose exec app npm install
fi

if [ ! -f ./public/css/app.css ] || [ ! -f ./public/js/app.js ]; then
    if [ APP_DEBUG ]; then
        docker-compose exec app npm run dev
    else
        docker-compose exec app npm run prod
    fi
fi
