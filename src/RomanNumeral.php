<?php
namespace PhpNwSykes;

class InvalidNumeral extends Exception {};


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
        try
        {
            $regexForNumerals = '/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';
            $total = 0;
            
            # Checks the numeral agaisnt the regex
            if(!preg_match($regexForNumerals,$this->numeral)) {
                throw new InvalidNumeral();
            }
        
            $symbolsArr = array('M'=>1000,'D'=>500,'C'=>100,'L'=>50,'X'=>10,'V'=>5,'I'=>1);
            $charArr = str_split($this->numeral); # Array of characters

            foreach ($charArr as $key=>$char) {
                $multiplier=1;
                # Check to see if loop is considering any symbol apart from the final (combining the two conditional statements would cause an index issue)
                if($key<count($charArr)-1){
                    # Check to see if the next symbol is greater then the current
                    if ($symbolsArr[$charArr[$key]]<$symbolsArr[$charArr[$key+1]]) { 
                        $multiplier=-1; 
                    }
                }
                $total += $multiplier*$symbolsArr[$charArr[$key]];
            }
            return $total;
        }
        catch (InvalidNumeral $ex)
        {
            echo "The numeral given is not a valid roman numeral. ";
            
            return 0;
        }
    }
}
