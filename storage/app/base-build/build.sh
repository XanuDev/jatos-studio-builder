#!/usr/bin/env bash

if [ ! -d "./node_modules" ]; then
    npm install
fi

# rm -rf dist
# for image in $IMAGES
# do
#     cp ../public/img/$image ./assets/img/
# done

BUILD_PAGES=$COMPONENT_PAGES VUE_APP_JSON_FILE=$FILE_NAME npm run build -- --dest $PROJECT_NAME
rm ../public/$PROJECT_NAME.zip
zip -r ../public/$PROJECT_NAME.zip $PROJECT_NAME
zip -ju ../public/$PROJECT_NAME.zip ../jas/$FILE_NAME.jas
rm -rf $PROJECT_NAME

# for image in $IMAGES
# do
#     rm ./assets/img/$image
# done
