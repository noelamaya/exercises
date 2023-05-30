<?php

declare(strict_types=1);

namespace Exercises\Tests;

use Exercises\ExerciseOne;
use PHPUnit\Framework\TestCase;

class ExerciseOneTest extends TestCase
{
    private ExerciseOne $sut;

    protected function setUp(): void
    {
        $this->sut = new ExerciseOne();
    }

    public function testFnAWithMatch(): void
    {
        $result = $this->sut->fnA("Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)");

        $this->assertSame([1071, 1061], $result);
    }

    /**
     * @dataProvider nonMatchingTexts
     */
    public function testFnAWithoutMatchs(string $text): void
    {
        $result = $this->sut->fnA($text);

        $this->assertEmpty($result);
    }

    public function testFnBWithMatch(): void
    {
        $result = $this->sut->fnB("Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)");

        $this->assertSame("Hola @Franklin avisa a @Ludmina", $result);
    }

    /**
     * @dataProvider nonMatchingTexts
     */
    public function testFnBWithoutMatchs(string $text): void
    {
        $result = $this->sut->fnB($text);

        $this->assertSame($text, $result);
    }

    /**
     * @return array<array<string>>
     */
    public static function nonMatchingTexts(): array
    {
        return [
            ["Hola @[Franklin](user-gpe-id) avisa a @[Ludmina](user-gpe-id)"],
            ["Hola @[Franklin](user-gpe-) avisa a @[Ludmina](user-gpe)"],
            ["Hola [Franklin](user-gpe-123) avisa a Ludmina(user-gpe-1018)"],
            ["Hola (user-gpe-123) avisa a (user-gpe-1018)"],
            ["Hola @[Franklin] avisa a [Ludmina]"],
        ];
    }
}
