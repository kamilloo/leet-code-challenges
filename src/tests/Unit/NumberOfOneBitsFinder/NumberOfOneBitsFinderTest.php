<?php
declare(strict_types=1);

namespace Tests\Unit\NumberOfOneBitsFinder;

use App\Console\Commands\NumberOfOneBitsCommand;
use App\NumberOfOneBits\NumberOfOneBitsFinder;
use PHPUnit\Framework\TestCase;

class NumberOfOneBitsFinderTest extends TestCase
{
    /**
     *  @dataProvider  bitStringProvider
     */
    public function test_find_number_of_one_bits(int $bits_string, int $one_count){

        $finder = new NumberOfOneBitsFinder();
        $number_of_the_bits = $finder->search( $bits_string);

        $this->assertSame($one_count, $number_of_the_bits);

    }

    public function bitStringProvider():array{
        return [
            [
                'bits_string' => 11,
                'one_count' => 3,
            ],
            [
                'bits_string' => 2097152,
                'one_count' => 1,
            ],
            [
                'bits_string' => 4294967293,
                'one_count' => 31,
            ],

        ];
    }
}