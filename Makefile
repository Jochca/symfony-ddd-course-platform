PHP_EXEC=docker compose exec php

cs:
	$(PHP_EXEC) ./vendor/bin/php-cs-fixer fix --dry-run --diff

csfix:
	$(PHP_EXEC) ./vendor/bin/php-cs-fixer fix

lint:
	$(PHP_EXEC) ./vendor/bin/phpstan analyse

test:
	$(PHP_EXEC) ./vendor/bin/phpunit
