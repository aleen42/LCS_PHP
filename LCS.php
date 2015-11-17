<?php
/**
 * Created by PhpStorm.
 * User: aleen42
 * Date: 9/25/15
 * Time: 12:17 PM
 */

class LCS 
{
    /**
     * [$b: is a two-dimentional array for recording the max length]
     * @var [type]
     */
    private $b;

    /**
     * [$c: is a two-dimentional array for tracing the longest common string]
     * @var [type]
     */
    private $c;

    /**
     * [$str1: the first string]
     * @var [type]
     */
    private $str1;

    /**
     * [$str2: the second string]
     * @var [type]
     */
    private $str2;

    /**
     * [$length: the length of the longest common string]
     * @var [type]
     */
    private $length;

    /**
     * [$commonString: the longest common string]
     * @var [type]
     */
    private $commonString;

    private function generateCommonString($str1_len, $str2_len) 
    {
        $i = $str1_len;
        $j = $str2_len;

        if ($i == 0 || $j == 0) {
            return;    
        }
        
        if ($this->b[$i][$j] == 'TOP_LEFT') {
            $this->generateCommonString($i - 1, $j - 1);
            $this->commonString .= substr($this->str1, $i, 1);
        } else if ($this->b[$i][$j] == 'TOP') {
            $this->generateCommonString($i - 1, $j);
        } else {
            $this->generateCommonString($i, $j - 1);
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function Calculate($str1, $str2) 
    {
        $this->str1 = $str1;
        $this->str2 = $str2;
        $this->c = array_fill(0, strlen($str1), array_fill(0, strlen($str2), array()));
        $this->b = array_fill(0, strlen($str2), array_fill(0, strlen($str2), array()));
        $this->commonString = '';
        $this->length = 0;

        $str1_len = strlen($this->str1);
        $str2_len = strlen($this->str2);

        for ($i = 1; $i <= $str1_len; $i++) {
            $this->c[$i][0] = 0;
        }

        for ($j = 0; $j <= $str2_len; $j++) {
            $this->c[0][$j] = 0;
        }

        for ($i = 1; $i <= $str1_len; $i++) {
            for ($j = 1; $j <= $str2_len; $j++) {
                if (substr($this->str1, $i, 1) == substr($this->str2, $j, 1)) {
                    $this->c[$i][$j] = $this->c[$i - 1][$j - 1] + 1;
                    $this->b[$i][$j] = 'TOP_LEFT';
                } else {
                    $this->c[$i][$j] = ($this->c[$i - 1][$j] >= $this->c[$i][$j - 1]) ? $this->c[$i - 1][$j] : $this->c[$i][$j - 1];
                    $this->b[$i][$j] = ($this->c[$i - 1][$j] >= $this->c[$i][$j - 1]) ? 'TOP' : 'LEFT';
                }
            }
        }

        $this->generateCommonString(strlen($this->str1), strlen($this->str2));

        $this->length = strlen($this->commonString);
    }
}
