<?php

declare(strict_types=1);

function revertCharacter($t): string
{
    $punct = ["!", ",", ".", "?"];
    $arr = explode(' ', $t);
    $result = [];

    foreach ($arr as $item) {
        $firstLetterIsUpper = false;
        $letters = mb_str_split($item);
        $firstLetterIsUpper = IntlChar::isupper($letters['0']);

        if ($firstLetterIsUpper) {
            $letters['0'] = mb_strtolower($letters['0']);
        }
        $reverse = array_reverse($letters);
        if (in_array($reverse['0'], $punct)) {
            array_push($reverse, $reverse['0']);
            array_shift($reverse);
        }
        if ($firstLetterIsUpper) {
            $reverse['0'] = mb_strtoupper($reverse['0']);
        }
        $result[] = implode('', $reverse);
    }
    return implode(' ', $result);
}