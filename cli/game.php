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

// Save existing tty configuration
$term = `stty -g`;

system("stty -icanon");
stream_set_blocking(STDIN, FALSE);

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

    $input = fread(STDIN,1);

    switch ($input) {
        case "l":
            // strike lighting, create 1 living blob
            $grid->setRandomBlobAlive(1);
            break;
        case "r":
            // create x random living blobs, x is related to grid size
            $grid->setRandomBlobAlive((int) floor(($width * $height)/256));
            break;
        case "n":
            // create a new grid
            $grid = $game->createRandomGrid($width, $height);
            break;
        case "q":
            exit(0);
            break;
        default:
            break;
    }
    ob_flush();
}

// Reset the tty back to the original configuration
system("stty '" . $term . "'");
exit(0);
