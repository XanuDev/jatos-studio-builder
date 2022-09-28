#!/usr/bin/env bash

if [ ! -f ./.env ]; then
    if [ -f ./.env.example ]; then
        cp .env.example .env
    else
        echo ".env file not found." >&2
        exit 1
    fi
fi

source ./.env
export APP_DEBUG=${APP_DEBUG:-'true'}
export APP_KEY=${APP_KEY:-''}
export APP_ENV=${APP_ENV:-'local'}

if ! docker info > /dev/null 2>&1; then
    echo "Docker is not running." >&2
    exit 1
fi

if ! docker-compose -v > /dev/null 2>&1; then
    echo "docker-compose is not instaled." >&2
    exit 1
fi

docker-compose up -d
docker-compose exec -u 0 jatos chown -R 1:1 /opt/docker/study_assets_root
docker-compose exec -u 0 jatos chown -R 1:1 /opt/docker/result_uploads

if [ ! -d "./vendor" ]; then
    docker-compose exec app composer install
fi

if [ $APP_ENV != "production" ]; then


until docker-compose exec db mysqladmin ping -P 3306 -p${DB_PASSWORD} | grep "mysqld is alive" ; do  
  >&2 echo "Waiting for MySQL to be ready for connections..."
  sleep 3
done

docker-compose exec app php artisan migrate --seed

fi

if [ ! -h "./public/storage" ]; then
    docker-compose exec app php artisan storage:link  
fi

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