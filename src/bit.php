<?php
require_once '../vendors/autoload.php';

use Eshu\Utility\Bits;

// Integer to check
$integer   = 455;

// Bit to check if set. Right to left
$check_bit = 3;

$bits = new Bits($integer);

echo "Integer set: {$integer}<br>";
echo "Binary String: {$bits->bits}<br>";
echo 'Bit Count: ' . $bits->countBits() . '<br>';
echo "Checking bit: {$check_bit}<br>";

if($bits->checkBit($check_bit)) echo "Bit {$check_bit} is set.";
else echo "Bit {$check_bit} is not set.";