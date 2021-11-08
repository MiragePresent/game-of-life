<?php

namespace Tests;

use MiragePresent\GoL\Game;
use PHPUnit\Framework\TestCase;

/**
 * Class GameOfLifeTest
 *
 * @author Davyd Holovii <mirage.present@gmail.com>
 * @since  08.11.2021
 */
class GameOfLifeTest extends TestCase
{
    // TODO: Test with more data
    public function test_default_case_with_borders()
    {
        $input = [
            [0, 0, 0, 0, 0],
            [0, 0, 1, 0, 0],
            [0, 0, 0, 1, 0],
            [0, 1, 1, 1, 0],
            [0, 0, 0, 0, 0],
        ];

        $game = new Game($input);
        $fistGeneration = $game->nextGeneration();

        $this->assertEquals(
            [
                [0, 0, 0, 0, 0],
                [0, 1, 0, 1, 0],
                [0, 0, 1, 1, 0],
                [0, 0, 1, 0, 0],
                [0, 0, 0, 0, 0],
            ],
            $fistGeneration
        );
    }
}
