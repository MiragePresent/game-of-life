<?php

namespace MiragePresent\GoL\Output;

/**
 * Class TextOutput
 *
 * @author Davyd Holovii <mirage.present@gmail.com>
 * @since  03.11.2021
 */
class Printer
{
    public static function print(string $text): void
    {
        echo sprintf("%s\n", $text);
    }
}
