#!/usr/bin/env bash


if [ ! -d "./node_modules" ]; then
    npm install
fi

rm -rf dist

npm run build
mv dist $PROJECT_NAME
zip -r $PROJECT_NAME.zip $PROJECT_NAME package.json
rm -rf $PROJECT_NAME

