<?php

require __DIR__ . '/bootstrap.php';

use MiragePresent\GoL\Output\GridOutput;
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

Printer::print('Initial state:');
GridOutput::print($input);

$interactions = 10;
$game = new Game($input);

while ($interactions--) {
    $generation = $game->nextGeneration();

    Printer::print(sprintf('%d iteration state:', $interactions + 1));
    GridOutput::print($generation);
}
