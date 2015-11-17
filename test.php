<?php
/**
 * Created by PhpStorm.
 * User: aleen42
 * Date: 9/25/15
 * Time: 12:22 PM
 */

require_once('LCS.php');

$str1 = "-9pks63ebel";
$str2 = "-9pk63ebel2";

$lcs = new LCS();
$lcs->Calculate($str1, $str2);

echo "Longest Common String: ";
echo $lcs->__get('commonString');
echo '<br />';
echo 'Match Rate: ' . ($lcs->__get('length') - 1) / (strlen($str1) - 1) * 100 . '%';