.PHONY: test
test:
	phpunit --colors tests

test-coverage:
	phpunit --colors --coverage-html build/coverage tests

run:
	@php cli/game.php 64 32 1

run-fuzzy:
	php cli/game.php 64 32 0

clean:
	rm -rf ./build