<?php

namespace MiragePresent\GoL;

use MiragePresent\GoL\Output\GridOutput;
use MiragePresent\GoL\Output\Printer;

class Game
{
    public function __construct(private array $grid) {}

    public function play(int $iterations)
    {
        Printer::print('Initial state:');
        GridOutput::print($this->grid);

        for ($i = 0; $i < $iterations; $i++) {
            $this->interact();

            Printer::print(sprintf('%d iteration state:', $i));
            GridOutput::print($this->grid);
        }

        Printer::print('Finish.');
    }

    private function interact()
    {

    }
}
