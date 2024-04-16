FROM dunglas/frankenphp

ENV SERVER_NAME=:80

COPY ./php-dev.ini $PHP_INI_DIR/php.ini

COPY . /app

RUN apt-get update && apt-get install -y --no-install-recommends \
	acl \
	file \
	gettext \
	git \
	&& rm -rf /var/lib/apt/lists/*

RUN set -eux; \
	install-php-extensions \
		@composer \
		apcu \
		intl \
		opcache \
		zip \
	;

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY --link ./composer.* /app
RUN set -eux; \
	composer install --prefer-dist --no-progress --no-interaction