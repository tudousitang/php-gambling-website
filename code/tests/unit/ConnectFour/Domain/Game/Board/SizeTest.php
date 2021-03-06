<?php

namespace Gambling\ConnectFour\Domain\Game\Board;

use Gambling\ConnectFour\Domain\Game\Exception\InvalidSizeException;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    /**
     * @test
     * @dataProvider correctSizeProvider
     *
     * @param int $width
     * @param int $height
     */
    public function itShouldBeCreatedSuccessfully(int $width, int $height): void
    {
        $size = new Size($width, $height);

        $this->assertSame($width, $size->width());
        $this->assertSame($height, $size->height());
    }

    /**
     * @return array
     */
    public function correctSizeProvider(): array
    {
        return [
            [4, 4],
            [7, 6],
            [5, 4],
            [10, 9]
        ];
    }

    /**
     * @test
     * @dataProvider wrongSizeProvider
     *
     * @param int $width
     * @param int $height
     */
    public function itShouldThrowAnExceptionOnInvalidSizes(int $width, int $height): void
    {
        $this->expectException(InvalidSizeException::class);

        new Size($width, $height);
    }

    /**
     * @return array
     */
    public function wrongSizeProvider(): array
    {
        return [
            [3, 3],
            [5, 5],
            [-1, 3],
            [2, -3],
            [-1, -3],
            [1, 1]
        ];
    }
}
