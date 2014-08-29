#!/usr/bin/env php
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
$renderer = new SubRenderer();

echo "\n";
ob_start();
while ($signalHandler->getSignal() === 0) {
    echo "\e[{$renderer->getHeight()}A";
    $renderer->render($grid);
    $grid = $game->createNextGrid($grid);
    ob_flush();
}