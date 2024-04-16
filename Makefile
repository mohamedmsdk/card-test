start:
	docker-compose up -d --build --force-recreate
	docker exec -it app composer install # I added this line because of a problem with vendor generation. This one is always deleted after the build.

stop:
	docker-compose down

clear: stop
	docker container prune -f
	docker image prune -a -f

test:
	docker exec -it app ./vendor/bin/phpunit ./tests