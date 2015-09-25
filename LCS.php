<?php
/**
 * Created by PhpStorm.
 * User: aleen42
 * Date: 9/25/15
 * Time: 12:17 PM
 */


function LCS($str1, $str2, $c, $b)
{
    global $b;
    global $c;
    $str1_len = strlen($str1);
    $str2_len = strlen($str2);

    for ($i = 1; $i <= $str1_len; $i++)
        $c[$i][0] = 0;
    for ($j = 0; $j <= $str2_len; $j++)
        $c[0][$j] = 0;
    for ($i = 1; $i <= $str1_len; $i++) {
        for ($j = 1; $j <= $str2_len; $j++) {
            if (substr($str1, $i, 1) == substr($str2, $j, 1)) {
                $c[$i][$j] = $c[$i - 1][$j - 1] + 1;
                $b[$i][$j] = 'TOP_LEFT';
            } else {
                $c[$i][$j] = ($c[$i - 1][$j] >= $c[$i][$j - 1]) ? $c[$i - 1][$j] : $c[$i][$j - 1];
                $b[$i][$j] = ($c[$i - 1][$j] >= $c[$i][$j - 1]) ? 'TOP' : 'LEFT';
            }
        }
    }
//    var_dump($c);
//    var_dump($b);
//    var_dump($c[$str1_len][$str2_len]);
    echo "Longest Common String Length: " . $c[$str1_len][$str2_len] . "<br />";
}

function PRINT_LCS($b, $str1, $str1_len, $str2_len)
{
    global $b;
    $i = $str1_len;
    $j = $str2_len;
//    var_dump($b);
    if ($i == 0 || $j == 0)
        return;
    if ($b[$i][$j] == 'TOP_LEFT') {
        PRINT_LCS($b, $str1, $i - 1, $j - 1);
        echo substr($str1, $i, 1);
    } else if ($b[$i][$j] == 'TOP') {
        PRINT_LCS($b, $str1, $i - 1, $j);
    } else {
        PRINT_LCS($b, $str1, $i, $j - 1);
    }
}