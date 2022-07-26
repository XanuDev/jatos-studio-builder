#!/usr/bin/env bash

if [ -f ./.env ]; then
    source ./.env
    export APP_DEBUG=${APP_DEBUG:-''}
    export APP_KEY=${APP_KEY:-''}
else
    if [ -f ./.env.example ]; then
        cp .env.example .env
    else
        echo ".env file not found." >&2
        exit 1
    fi
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
docker-compose exec app php artisan storage:link

if [ ! -d "./node_modules" ]; then
    docker-compose exec app npm install
fi

if [ ! -f ./public/css/app.css ] || [ ! -f ./public/js/app.js ]; then
    if [ $APP_DEBUG ]; then
        docker-compose exec app npm run dev
    else
        docker-compose exec app npm run prod
    fi
fi

if [ ! $APP_KEY ]; then    
    docker-compose exec app php artisan key:generate
fi