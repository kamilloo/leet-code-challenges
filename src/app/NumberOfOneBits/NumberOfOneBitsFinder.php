<?php
declare(strict_types=1);

namespace App\NumberOfOneBits;

class NumberOfOneBitsFinder
{
    public function search(int $bit_string):int
    {
        //00000000000000000000000000001011
        $sum = 0;
        $bit_string = decbin($bit_string);
        for ($i = 0;$i<strlen($bit_string);$i++){
            if($bit_string[$i]){
                $sum++;
            }
        }
        return $sum;
    }
}