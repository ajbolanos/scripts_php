<?php
namespace Eshu\Utility;


class Bits{
    public $byte;
    public $bits;
    public $byteStrlen;

    function __construct($byte){
        $this->setByte($byte);
        $this->setBits($byte);
    }

    function setByte($v){
        $this->byte = (int) $v;
    }

    function setBits($v){
        $this->bits = decbin($v);
    }

    function setByteStrlen(){
        $this->byteStrlen = mb_strlen($this->bits);
    }

    /**
     * Count bits in a byte
     *
     * @return int
     */
    function countBits(){

        // Get set byte
        $byte = $this->byte;

        // Count
        $c = 0;

        // Bit shift right
        while($byte)
        {
            $c += ($byte & 1);
            $byte = $byte >> 1;
        }

        return $c;
    }

    /**
     * Checks bits from right to left
     *
     * @param $checkBit
     * @return bool
     */
    function checkBit($checkBit){

        $pow = pow(2, $checkBit) / 2;
        if($this->byte & $pow) return TRUE;
        else return FALSE;
    }

}

