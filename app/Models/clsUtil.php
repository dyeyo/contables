<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\clsBd;
use DB;
use Config;

class clsUtil extends Model {

    protected $bd;

    function __construct(clsBd $bd) {
        $this->bd = $bd;
    }

    /**
     * Function that removes extraneous characters
     * @param String $val
     * @param int $cant_caracteres
     * @return String
     * */
    function limpia_dato($val, $cant_caracteres = '') {
        if (!empty($cant_caracteres))
            $val = addslashes(trim(substr($val, 0, $cant_caracteres)));
        else
            $val = addslashes(trim(strtoupper($val)));

        $val = str_replace("'", "", $val);
        $val = str_replace("\"", "", $val);
        $val = str_replace("(", "", $val);
        $val = str_replace(")", "", $val);
        $val = str_replace("&", "", $val);
        $val = str_replace("|", "", $val);
        $val = str_replace("<", "", $val);
        $val = str_replace(">", "", $val);
        $val = str_replace("--", "", $val);
        $val = str_replace("�", "�", $val);
        $val = str_replace("�", "�", $val);
        $val = str_replace("�", "a", $val);
        $val = str_replace("�", "A", $val);
        $val = str_replace("�", "a", $val);
        $val = str_replace("�", "A", $val);
        $val = str_replace("�", "e", $val);
        $val = str_replace("�", "E", $val);
        $val = str_replace("�", "i", $val);
        $val = str_replace("�", "I", $val);
        $val = str_replace("�", "o", $val);
        $val = str_replace("�", "O", $val);
        $val = str_replace("�", "u", $val);
        $val = str_replace("�", "U", $val);
        $val = str_replace('"', "", $val);
        $val = str_replace('/', "", $val);
        $val = preg_replace("[\n|\r|\n\r]", " ", $val);

        return $val;
    }

   

    function camel_case($str, array $noStrip = []) {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
    }

   
    function pg_array_parse($literal) {
        if ($literal == '')
            return;
        preg_match_all('/(?<=^\{|,)(([^,"{]*)|\s*"((?:[^"\\\\]|\\\\(?:.|[0-9]+|x[0-9a-f]+))*)"\s*)(,|(?<!^\{)(?=\}$))/i', $literal, $matches, PREG_SET_ORDER);
        $values = [];
        foreach ($matches as $match) {
            $values[] = $match[3] != '' ? stripcslashes($match[3]) : (strtolower($match[2]) == 'null' ? null : $match[2]);
        }
        return $values;
    }

    function validate_date($date, $format = 'Y-m-d') {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    function str_wrap($string = '', $char = "'") {
        return str_pad($string, strlen($string) + 2, $char, STR_PAD_BOTH);
    }

    //Valida si existe una posicion en un array y si es númerica, se usa para los formularios 
    function validate_field($arr, $input, $numeric = false) {
        if ($numeric == true) {
            return (((isset($arr[$input]) && !empty($arr[$input]) && is_numeric($arr[$input]))) ? $arr[$input] : 0);
        } else {
            return ((isset($arr[$input]) && !empty($arr[$input])) ? $arr[$input] : NULL);
        }
    }

    function ultimo_dia_mes($year, $month) {
        $ultimo_dia = date("d", (mktime(0, 0, 0, $month + 1, 1, $year) - 1));
        return $ultimo_dia;
    }

}
