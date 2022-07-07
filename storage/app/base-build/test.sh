#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

BUILD_PAGES=test VUE_APP_JSON_FILE=test npm run serve
