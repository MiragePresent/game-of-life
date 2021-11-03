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
        foreach ($grid as $row) {
            foreach ($row as $cell) {
                echo 1 === $cell ? "▓▓" : "░░";
            }

            echo PHP_EOL;
        }
    }
}
