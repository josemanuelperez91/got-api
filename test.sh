#!/bin/bash

MAGENTA="96"
BOLDMAGENTA="\e[1;${MAGENTA}m"
ENDCOLOR="\e[0m"

echo -e "${BOLDMAGENTA}RUNNING TESTS${ENDCOLOR}"
docker-compose exec app vendor/bin/phpunit

echo -e "${BOLDMAGENTA}RUNNING COVERAGE${ENDCOLOR}"
docker-compose exec app vendor/bin/phpunit --coverage-html tests/coverage
