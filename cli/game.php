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

$fuzzy = true;
if (array_key_exists(3, $argv)) {
    $fuzzy = $argv[3];
}


$game = new Game();
$grid = $game->createRandomGrid($width, $height);
$renderer = new SubRenderer(); 
if ($fuzzy) {
    $renderer = new FuzzyRenderer();
}

ob_start();
while ($signalHandler->getSignal() === 0) {
    echo "\e[{$renderer->getHeight()}A";
    $renderer->render($grid);
    sleep(0.01);
    $grid = $game->createNextGrid($grid);
    ob_flush();
}
