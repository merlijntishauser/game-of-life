<?php

declare(ticks = 1);
namespace GameOfLife;

require_once sprintf(
    '%s%2$s..%2$svendor%2$sautoload.php',
    __DIR__,
    DIRECTORY_SEPARATOR
);

$signalHandler = new SignalHandler();
pcntl_signal(SIGINT, $signalHandler);

$width = $argv[1];
$height = $argv[2];

$game = new Game();
$grid = $game->createRandomGrid($width, $height);
$renderer = new FuzzyRenderer('█', array(' ', '░','▒', '▓'));

ob_start();
while ($signalHandler->getSignal() === 0) {
    $renderer->render($grid);
    $grid = $game->createNextGrid($grid);
    echo "\e[{$renderer->getHeight()}A";
    ob_flush();
}
$renderer->render($grid);