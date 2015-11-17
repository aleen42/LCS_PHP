<?php
/**
 * Created by PhpStorm.
 * User: aleen42
 * Date: 11/17/15
 * Time: 13:53 PM
 */

require_once('LCS.php');

class LCSTest extends PHPUnit_Framework_TestCase 
{
	public function testString()
	{
		$lcs = new LCS();

		/**
		 * Test Case 1
		 */
		$str1 = "-9pks63ebel";
		$str2 = "-9pk63ebel2";

		
		$lcs->Calculate($str1, $str2);
		$this->assertEquals('9pk63ebel', $lcs->__get('commonString'));

		/**
		 * Test Case 1
		 */
		$str1 = "-ACCGGTCGAGTGCGCGGAAGCCGGCCGAA";
		$str2 = "-GTCGTTCGGAATGCCGTTGCTCTGTAAA";

		$lcs->Calculate($str1, $str2);
		$this->assertEquals('GTCGTCGGAAGCCGGCCGAA', $lcs->__get('commonString'));
	}
}