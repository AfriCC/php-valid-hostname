SHELL := bash


.PHONY: build
build:
	composer install \
		--no-interaction \
		--prefer-dist


.PHONY: test
test:
ifeq ($(RUN_COVERAGE),true)
	mkdir -p build/logs
	vendor/bin/phpunit --coverage-text --coverage-clover build/logs/clover.xml
	vendor/bin/coveralls --quiet
else
	vendor/bin/phpunit
endif
