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

    public function testFnA(): void
    {
        $result = $this->sut->fnA("Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)");

        $this->assertSame([1071, 1061], $result);
    }

    public function testFnB(): void
    {
        $result = $this->sut->fnB("Hola @[Franklin](user-gpe-1071) avisa a @[Ludmina](user-gpe-1061)");

        $this->assertSame("Hola @Franklin avisa a @Ludmina", $result);
    }
}
