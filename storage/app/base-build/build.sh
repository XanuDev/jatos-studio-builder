#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

rm -rf dist
npm run vue-cli-service build --dest $PROJECT_NAME
mv dist $PROJECT_NAME
zip -r $PROJECT_NAME.zip $PROJECT_NAME example.jas
rm -rf $PROJECT_NAME
