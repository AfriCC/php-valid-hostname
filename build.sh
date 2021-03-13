#!/usr/bin/env bash

__DIR__="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# required libs
source "${__DIR__}/.bash/functions.shlib"

set -E
trap 'throw_exception' ERR

consolelog 'composer install'
composer install \
  --no-interaction \
  --prefer-dist \
  --no-suggest \
  &> /dev/null

consolelog 'install phpunit'
# switch phpunit version depending on php version
composer require \
  --dev \
  --update-with-dependencies \
  phpunit/phpunit \
  &> /dev/null

if [[ -n "${RUN_COVERAGE}" ]]; then
  consolelog 'run tests & coverage'

  mkdir -p build/logs
  vendor/bin/phpunit --coverage-text --coverage-clover build/logs/clover.xml
  vendor/bin/coveralls --quiet
else
  consolelog 'run tests'
  vendor/bin/phpunit
fi

consolelog 'composer optimise'
composer remove \
  --dev \
  phpunit/phpunit \
  &> /dev/null

composer install \
  --no-dev \
  &> /dev/null

composer dump-autoload \
  --no-dev \
  --classmap-authoritative \
  &> /dev/null
