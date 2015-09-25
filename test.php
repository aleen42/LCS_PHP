<?php
/**
 * Created by PhpStorm.
 * User: aleen42
 * Date: 9/25/15
 * Time: 12:22 PM
 */

require_once('LCS.php');

$str1 = "-MAEEEVAKLEKHLMLLRQEYVKLQKKLAETEKRCALLAAQANKESSSESFISRLLAIVAD";
$str2 = "-MAEEEVAKLEKHLMLLRQEYVKLQKKLAETEKRCTLLAAQANKENSNESFISRLLAIVAG";


$c = array_fill(0, strlen($str1), array_fill(0, strlen($str2), array()));
$b = array_fill(0, strlen($str2), array_fill(0, strlen($str2), array()));


echo 'str1: ' . $str1 . '<br />';
echo 'str2: ' . $str2 . '<br />';
LCS($str1, $str2, $c, $b);
echo "Longest Common String: ";
PRINT_LCS($b, $str1, strlen($str1), strlen($str2));
echo '<br />';
echo 'Match Rate: ' . $c[strlen($str1)][strlen($str2)] / strlen($str1) * 100 . '%';

//var_dump($c);