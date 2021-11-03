<?php

require __DIR__ . '/bootstrap.php';

use MiragePresent\GoL\Output\Printer;
use MiragePresent\GoL\Game;

$input = [
  [0, 0, 0, 0, 0],
  [0, 0, 1, 0, 0],
  [0, 0, 0, 1, 0],
  [0, 1, 1, 1, 0],
  [0, 0, 0, 0, 0],
];

Printer::print("Hello from Game of Life\n");

$game = new Game($input);
$game->play(0);
