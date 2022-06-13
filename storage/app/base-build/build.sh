#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

rm -rf dist
npm run build -- --dest $PROJECT_NAME
zip -r ../public/$PROJECT_NAME.zip $PROJECT_NAME ../$JAS_FILE
rm -rf $PROJECT_NAME
