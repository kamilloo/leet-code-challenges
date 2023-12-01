<?php
declare(strict_types=1);

namespace App\CheckTwoStringArrays;

class CheckTwoStringArrays
{

    public function stringAreTheSame(array $word1, array $word2):bool
    {
        //Input: word1 = ["ab", "c"], word2 = ["a", "bc"]

        $implode_word_1 = implode($word1);
        $implode_word_2 = implode($word2);

        return $implode_word_1 == $implode_word_2;
    }
}