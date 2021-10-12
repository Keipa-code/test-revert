<?php

declare(strict_types=1);

namespace App\Test;

use TypeError;

final class Test extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        require_once '../src/revert.php';
    }

    public function testSuccess() {
        $text = "Привет! Давно не виделись.";
        $checkText = "Тевирп! Онвад ен ьсиледив.";

        $revertText = revertCharacter($text);
        self::assertEquals($checkText, $revertText);
    }

    public function testTypeError(){
        $text = ['0'];
        $this->expectException(TypeError::class);
        revertCharacter($text);
    }
}