#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

rm -rf dist
BUILD_PAGES=$COMPONENT_PAGES npm run build -- --dest $PROJECT_NAME
rm ../public/$PROJECT_NAME.zip
zip -r ../public/$PROJECT_NAME.zip $PROJECT_NAME
zip -ju ../public/$PROJECT_NAME.zip ../jas/$JAS_FILE
rm -rf $PROJECT_NAME
