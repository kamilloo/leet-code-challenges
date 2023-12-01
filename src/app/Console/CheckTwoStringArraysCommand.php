<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\CheckTwoStringArrays\CheckTwoStringArrays;

class CheckTwoStringArraysCommand
{
    public function execute():void{

        $checker = new CheckTwoStringArrays();

        $word1  = ["abc", "de", "defg"];
        $word2 = ["abcddefg"];

        $checked = $checker->stringAreTheSame($word1, $word2);

        if ($checked){
            print_r("The strings are the same");
        }else{
            print_r("The strings are not the same");
        }
        exit(0);
    }
}