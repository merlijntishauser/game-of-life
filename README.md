# Conway's Game Of Life

Conway's game of life describes four simple rules:

1. Any live cell with fewer than two live neighbours dies, as if caused by under-population.
2. Any live cell with two or three live neighbours lives on to the next generation.
3. Any live cell with more than three live neighbours dies, as if by over-population.
4. Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction

Cells placed randomly in a grid will obey to those rules.

This project started out as exercise during a [code kata](http://www.codekatas.org) at work.
It is now completely over-engineered just for the fun of it.

## Run the game
 ```
 make run
 ```

## Run the tests
 ```
 make test
 ```
