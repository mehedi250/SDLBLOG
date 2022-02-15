<?php
use Carbon\Carbon;

if (!function_exists('imageName')) {
    function imageName($name, $withExt = 1, $prefix = NULL, $suffix = NULL)
    {
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $name = preg_replace("/[\s]|\#|\$|\&|\@/", "_", pathinfo($name, PATHINFO_FILENAME));
        $name = $prefix . '_' . $name . '_' . $suffix;
        if ($prefix == NULL) {
            $name = substr($name, -170);
        } else {
            $name = substr($name, 0, 170);
        }

        $name .= ('_' . time());

        if ($withExt) {
            $name .= ('.' . $extension);
        }

        return $name;
    }
}

if (!function_exists('imageExtension')) {
    function imageExtension($name)
    {
        return pathinfo($name, PATHINFO_EXTENSION);
    }
}

function num_to_word($number, $currency = ' Taka', $currencyDec = ' Poysa', $decWord = 'and')
{
    // ABS
    $number = abs($number);

    //Get the integer part
    $intpart = floor($number);

    //Get the fraction part
    $fraction = round($number - $intpart, 2);
    if ($fraction > 0)
        $fraction = substr($fraction, 2);
    //look([$intpart, $fraction]);
    $my_number = $intpart;
    if (($intpart < 0) || ($intpart > 999999999)) {
        throw new Exception("Number is out of range");
    }
    $Kt = floor($intpart / 10000000); /* Koti */
    $intpart -= $Kt * 10000000;
    $Gn = floor($intpart / 100000);  /* lakh  */
    $intpart -= $Gn * 100000;
    $kn = floor($intpart / 1000);     /* Thousands (kilo) */
    $intpart -= $kn * 1000;
    $Hn = floor($intpart / 100);      /* Hundreds (hecto) */
    $intpart -= $Hn * 100;
    $Dn = floor($intpart / 10);       /* Tens (deca) */
    $n = $intpart % 10;               /* Ones */
    $res = "";
    if ($Kt) {
        $res .= num_to_word($Kt, '') . " Koti ";
    }
    if ($Gn) {
        $res .= num_to_word($Gn, '') . " Lakh";
    }
    if ($kn) {
        $res .= (empty($res) ? "" : " ") .
            num_to_word($kn, '') . " Thousand";
    }
    if ($Hn) {
        $res .= (empty($res) ? "" : " ") .
            num_to_word($Hn, '') . " Hundred";
    }
    $ones = array(
        "", "One", "Two", "Three", "Four", "Five", "Six",
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen",
        "Nineteen"
    );
    $tens = array(
        "", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty",
        "Seventy", "Eighty", "Ninety"
    );
    if ($Dn || $n) {
        if (!empty($res)) {
            $res .= " and ";
        }
        if ($Dn < 2) {
            $res .= $ones[$Dn * 10 + $n];
        } else {
            $res .= $tens[$Dn];
            if ($n) {
                $res .= "-" . $ones[$n];
            }
        }
    }
    if (empty($res)) {
        $res = "zero";
    }

    if ((int)$fraction > 0) {
        $tmpDec = num_to_word($fraction, '');
        return $res . ' ' . $currency . ' ' . $decWord . ' ' . $tmpDec . $currencyDec;
    }
    return $res . $currency;
}

if (!function_exists('isExist')) {
    function isExist($fileName, $folder = "")
    {
        if ($fileName != NULL && $fileName != '' && $fileName != '0' && file_exists(public_path().DIRECTORY_SEPARATOR.$fileName) && !is_dir($fileName)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('unlinkFile')) {
    function unlinkFile($fileName)
    {
        if(isExist($fileName)){
            unlink(public_path().DIRECTORY_SEPARATOR.$fileName);
        }
    }
}

if (!function_exists('turncutText')) {
    function turncutText($text, $length = 0, $end = 1)
    {
        if ($end) {
            $name = substr($text, -$length);
        } else {
            $name = substr($text, 0, $length);
        }

        $name = (strlen($name) > 0) ? '...' . $name : '';
        return $name;
    }
}


