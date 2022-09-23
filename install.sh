#!/bin/bash

MAGENTA="96"
BOLDMAGENTA="\e[1;${MAGENTA}m"
ENDCOLOR="\e[0m"

echo -e "${BOLDMAGENTA}Building GOT-API${ENDCOLOR}"
docker-compose build app
sleep 3
echo -e "${BOLDMAGENTA}Running GOT-API app${ENDCOLOR}"
docker-compose up -d
sleep 3
echo -e "${BOLDMAGENTA}Installing GOT-API dependencies${ENDCOLOR}"
docker-compose exec app composer install
sleep 3
echo -e "${BOLDMAGENTA}Seeding GOT DB${ENDCOLOR}"
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
