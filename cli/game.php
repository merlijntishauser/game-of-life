<?php

namespace GameOfLife;

require_once sprintf(
    '%s%2$s..%2$svendor%2$sautoload.php',
    __DIR__,
    DIRECTORY_SEPARATOR
);

$width = $argv[1];
$height = $argv[2];

$game = new Game();
$grid = $game->createRandomGrid($width, $height);
$renderer = new Renderer('✶', ' ');

while (true) {
    $renderer->render($grid);
    $grid = $game->createNextGrid($grid);
    usleep(20000);
}