<?php

require_once '../vendors/autoload.php';

//use Ignite\Utility\Uuid;


$guid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
  mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
  mt_rand(0, 0x0fff) | 0x4000,
  mt_rand(0, 0x3fff) | 0x8000,
  mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
);

$guid = '8cb8c384-7d8b-4cef-97e4-ae324ff2cf8d';

//UUID::generate();

// Convert a string into binary
// Should output: 0101001101110100011000010110001101101011
//$value = unpack('H*', 'Stack');
//echo base_convert($value[1], 16, 2);

// Convert binary into a string
// Should output: Stack
//echo pack('H*', base_convert('0101001101110100011000010110001101101011', 2, 16));