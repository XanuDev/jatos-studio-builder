#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

BUILD_PAGES="index" VUE_APP_JSON_FILE=test npm run serve
