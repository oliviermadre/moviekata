pwd := $(shell pwd)

uid := $(shell stat -c %u ${pwd})
gid := $(shell stat -c %g ${pwd})

php = docker run -it --rm -u ${uid}:${gid} -v ${pwd}:/app alexdpy/php:7.1 php
composer = docker run -it --rm -u ${uid}:${gid} -v ${pwd}:/app -v ~/.composer:/composer -v ~/.ssh:/root/.ssh composer/composer

help:
	cat Makefile

install:
	mkdir -p ~/.composer && $(composer) install

test:
	$(php) vendor/bin/phpunit --coverage-html ./tests-coverage

run:
	$(php) bin/kata.php

coverage:
	firefox ./tests-coverage/index.html

