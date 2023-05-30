<?php

declare(strict_types=1);

namespace Exercises\Tests;

use Exercises\ExerciseTwo;
use Generator;
use PHPUnit\Framework\TestCase;

class ExerciseTwoTest extends TestCase
{
    /**
     * @dataProvider data
     * @param array<array<string, mixed>> $inputArray
     * @param array<string, string> $inputSortCriterion
     * @param array<array<string, mixed>> $expectedArray
     */
    public function testOrderArrays(array $inputArray, array $inputSortCriterion, array $expectedArray): void
    {
        $sut = new ExerciseTwo();

        $result = $sut->orderArrays($inputArray, $inputSortCriterion);

        $this->assertSame($expectedArray, $result);
    }

    public static function data(): Generator
    {
        yield 'age DESC, scoring DESC' => [
            self::inputExample(),
            ['age' => 'DESC', 'scoring' => 'DESC'],
            [
                ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
                ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
                ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
                ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
            ],
        ];
        yield 'age ASC, scoring DESC' => [
            self::inputExample(),
            ['age' => 'ASC', 'scoring' => 'DESC'],
            [
                ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
                ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
                ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ],
        ];
        yield 'age ASC, scoring ASC' => [
            self::inputExample(),
            ['age' => 'ASC', 'scoring' => 'ASC'],
            [
                ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
                ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
                ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ],
        ];
        yield 'user ASC, age DESC, scoring DESC' => [
            self::inputExample(),
            ['user' => 'ASC', 'age' => 'DESC', 'scoring' => 'DESC'],
            [
                ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
                ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
                ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
                ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ],
        ];
        yield 'user DESC, age DESC, scoring ASC' => [
            self::inputExample(),
            ['user' => 'DESC', 'age' => 'DESC', 'scoring' => 'ASC'],
            [
                ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
                ['user' => 'Patricio', 'age' => 22, 'scoring' => 9],
                ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
                ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ],
        ];
    }

    /**
     * @return array<array<string, mixed>>
     */
    private static function inputExample(): array
    {
        return [
            ['user' => 'Oscar', 'age' => 18, 'scoring' => 40],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 10],
            ['user' => 'Zulueta', 'age' => 33, 'scoring' => -78],
            ['user' => 'Mario', 'age' => 45, 'scoring' => 78],
            ['user' => 'Patricio', 'age' => 22, 'scoring' => 9]
        ];
    }
}
