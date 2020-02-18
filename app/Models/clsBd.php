<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use DB;

class clsBd extends Model {

    public $connection_defult = 'pgsql';

    

    //Metodo para ejecutar consultar de procedimientos almacenados
    public function ejecuta_procedimiento($arrData) {
        $param = '';
        $connection = (isset($arrData['connection']) && !empty($arrData['connection'])) ? $arrData['connection'] : $this->connection_defult;

        $return = '';
        $group_by = '';

        if (isset($arrData['return'])) {
            foreach ($arrData['return'] as $returns) {
                $return .= (!empty($return) ? ' , ' . $returns : ' AS (' . $returns);
            }
            $return .= ')';
        }
        //La posicion alias se usa cuando el pl no retorna un record setof, es decir,solo retorna un valor, lo retorna en la posicion[1]
        if (isset($arrData['alias'])) {
            $return .= (!empty($arrData['alias'])) ? ' AS ' . $arrData['alias'] : '';
        }
        if (isset($arrData['param'])) {
            foreach ($arrData['param'] as $params) {
                $param .= (!empty($param) ? " , '$params'" : "'$params'");
            }
        }
        if (isset($arrData['json']))
            $param .= '::JSON';

        if (isset($arrData['group_by']))
            $group_by = ' GROUP BY ' . $arrData['group_by'];

        if (isset($arrData['toSql'])) {
            $data = $this->name_procedure($arrData) . ' (' . $param . ') ' . $return . $group_by;
        } else {
            $data = DB::connection($connection)->select($this->name_procedure($arrData) . ' (' . $param . ') ' . $return . $group_by);
            if (isset($arrData['alias']) && !isset($arrData['json'])) {
                $data = json_encode($data, true);
                $str = str_replace(array('[', ']', '{', '}'), "", $data);
                $data = explode(':', $str);
            }
        }

        return $data;
    }

    public function name_procedure($arrData) {
        $return_select = '*';

        if (isset($arrData['return_select'])) {
            $return_select = '';
            foreach ($arrData['return_select'] as $return) {
                $return_select .= (!empty($return_select) ? ' , ' . $return : $return);
            }
        }

        $select = (isset($arrData['return']) ? 'SELECT ' . $return_select . ' FROM ' . $arrData['name'] : 'SELECT ' . $arrData['name']);
        return $select;
    }

}
