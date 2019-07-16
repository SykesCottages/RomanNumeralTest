# RomanNumeralTest

To install this you will need PHP and Composer

running ubuntu this can be installed with `sudo apt install php composer` then in this directory run `composer install`

# The task

The aim is is implement the source code [link](https://github.com/SykesCottages/RomanNumeralTest/blob/master/src/RomanNumeral.php) to pass the pre written tests.

To run the tests run `./vendor/bin/phpunit` and look at the output.

The `toInt` function should be able to translate any Roman Numerial to the correct integer.

For example `VI` should return `6` and `XX` should return `20`

# Cant get phpunit running ?

Included is an index file (index.php) This should run on any web server (eg MAMP, XAMP etc)
