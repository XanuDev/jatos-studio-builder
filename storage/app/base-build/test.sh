#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

COMPONENT_PAGES="Componente_1 Componente_2"
FILE_NAME="test"
PROJECT_NAME="TestProyect"

BUILD_PAGES=$COMPONENT_PAGES VUE_APP_JSON_FILE=$FILE_NAME npm run build -- --dest $PROJECT_NAME
rm ../../../../$PROJECT_NAME.zip
zip -r ../../../../$PROJECT_NAME.zip $PROJECT_NAME
zip -ju ../../../../$PROJECT_NAME.zip ../jas/$FILE_NAME.jas
rm -rf $PROJECT_NAME

#BUILD_PAGES="index" VUE_APP_JSON_FILE=test npm run serve
