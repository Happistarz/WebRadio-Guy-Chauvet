#!/bin/bash

chmod -R 775 /var/www
chown -R www-data /var/www


rm -r /var/www/html/WebRadio-Guy-Chauvet

cp /var/www/html/ /var/www/html/WebRadio-Guy-Chauvet

git add .

#git pull WebRadio-Guy-Chauvet testdebian

git commit -m "Commit debian"

git push --force-with-lease WebRadio-Guy-Chauvet testdebian

