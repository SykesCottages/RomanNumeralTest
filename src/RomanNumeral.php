<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {

        function romanToInteger($roman) {
            $roman = strtoupper($roman);
            $roman = str_split($roman);
            $result = 0;
            $romanValues = [
                'M' => 1000,
                'D' => 500,
                'C' => 100,
                'L' => 50,
                'X' => 10,
                'V' => 5,
                'I' => 1,
            ];
            
            foreach ($roman as $key => $value) {
                if ($key < count($roman) - 1) {
                    $next = $roman[$key + 1];
                    if ($romanValues[$value] < $romanValues[$next]) {
                        $result -= $romanValues[$value];
                    } else {
                        $result += $romanValues[$value];
                    }
                }
            }
            return $result;
        }
        
    }
}