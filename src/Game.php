<?php

namespace MiragePresent\GoL;

class Game
{
    public function __construct(private array $grid) {}

    public function nextGeneration(): array
    {
        $nextGrid = [];

        $minY = array_key_first($this->grid) - 1;
        $maxY = array_key_last($this->grid) + 1;
        $minX = array_key_first(current($this->grid)) - 1;
        $maxX = array_key_last(current($this->grid)) + 1;

        for ($y = $minY; $y <= $maxY;  $y++) {
            for ($x = $minX; $x <= $maxX; $x++) {
                $nextGrid[$y][$x] = (int) $this->doesSurvive($y, $x, $this->grid);
            }
        }

        $this->grid = $this->normilize($nextGrid);

        return $this->grid;
    }

    private function doesSurvive($y, $x, $grid): bool
    {
        $countAliveSiblings = 0;

        for ($yy = $y - 1; $yy <= $y + 1 ; $yy++) {
            for ($xx = $x - 1; $xx <= $x + 1; $xx++) {
                if (!isset($grid[$yy][$xx])) {
                    continue;
                }

                if ($yy === $y && $xx === $x) {
                    continue;
                }

                $countAliveSiblings += $grid[$yy][$xx];
            }
        }

        $isAlive = (bool) ($grid[$y][$x] ?? false);

        return !$isAlive
            ? 3 === $countAliveSiblings
            : $countAliveSiblings >= 2 && $countAliveSiblings <= 3;
    }

    // TODO: Move it to Grid Class
    private function normilize(array $grid): array
    {
        // normilize top
        while (array_sum(current($grid)) === 0 && array_sum($grid[key($grid) + 1]) === 0) {
            array_shift($grid);
        }

        // Normilize bottom
        while (
            array_sum($grid[array_key_last($grid)]) === 0
            && array_sum($grid[array_key_last($grid) - 1] ?? []) === 0
        ) {
            array_pop($grid);
        }

        // normilize left side
        $columnNum = array_key_first(current($grid));
        $firstColumn = array_column($grid, $columnNum);
        $secondColumn = array_column($grid, $columnNum + 1);

        while (
            !empty($firstColumn)
            && !empty($secondColumn)
            && array_sum($firstColumn) === 0
            && array_sum($secondColumn) === 0
        ) {
            foreach ($grid as &$row) {
                unset($row[$columnNum]);
            }

            $columnNum = array_key_first(current($grid));
            $firstColumn = array_column($grid, $columnNum);
            $secondColumn = array_column($grid, $columnNum + 1);
        }

        // normilize right side
        $columnNum = array_key_last(current($grid));
        $firstColumn = array_column($grid, $columnNum);
        $secondColumn = array_column($grid, $columnNum - 1);

        while (
            !empty($firstColumn)
            && !empty($secondColumn)
            && array_sum($firstColumn) === 0
            && array_sum($secondColumn) === 0
        ) {
            foreach ($grid as &$row) {
                unset($row[$columnNum]);
            }

            $columnNum = array_key_last(current($grid));
            $firstColumn = array_column($grid, $columnNum);
            $secondColumn = array_column($grid, $columnNum - 1);
        }

        return $grid;
    }
}
