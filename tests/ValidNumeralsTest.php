<?php
namespace PhpNwSykes\Tests;

use PhpNwSykes\RomanNumeral;
use PHPUnit\Framework\TestCase;

class ValidNumeralsTest extends TestCase
{
    /**
     * @param $numeral The numeral to convert
     * @param $expected Expected output
     * @dataProvider numeralMapping
     */
    public function testValidInput($numeral, $expected)
    {
        $roman = new RomanNumeral($numeral);
        $this->assertSame($expected, $roman->toInt());
    }

    public function numeralMapping()
    {
        return [
            ['X', 10],
            ['IX', 9],
            ['V', 5],
            ['MMX', 2010],
        ];
    }

    public function testDoubleParse()
    {
        $roman = new RomanNumeral('MX');
        $this->assertSame(1010, $roman->toInt());
        $this->assertSame(1010, $roman->toInt());
    }
}
