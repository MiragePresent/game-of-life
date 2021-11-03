<?php

namespace MiragePresent\GoL\Output;

/**
 * Class Ascii
 *
 * @author Davyd Holovii <mirage.present@gmail.com>
 * @since  03.11.2021
 */
class GridOutput
{
    public static function print(array $grid): void
    {
        echo sprintf("    %s\n", implode('  ', range(0, count($grid[0]) - 1)));

        foreach ($grid as $rowNum => $row) {
            echo sprintf(' %d ', $rowNum);

            foreach ($row as $cell) {
                echo 1 === $cell ? "▓▓ " : "░░ ";
            }

            echo PHP_EOL;
        }
    }
}
