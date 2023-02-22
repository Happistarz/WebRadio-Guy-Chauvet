#!/bin/bash

rm -r /var/www/html/WebRadio-Guy-Chauvet

# Cloner le référentiel GitHub avec la branche spécifique et une profondeur d'historique de 1 commit
git clone https://github.com/Happistarz/WebRadio-Guy-Chauvet  --branch dev  --single-branch .

# Définir le chemin du répertoire de destination sur votre machine Debian
destination="/var/www/html"
