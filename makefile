.PHONY: test
test:
	phpunit --colors tests

run:
	php cli/game.php 64 32 1

run-fuzzy:
	php cli/game.php 64 32 0

