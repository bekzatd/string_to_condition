<?php

namespace bekzatd\string_to_condition;
use yii\base\ErrorException;
use yii\web\NotFoundHttpException;

class Converter
{
    public static function if($string)
    {
        $conditions = explode(' ', $string);
        $result = [];
        foreach ($conditions as $e => $condition) {
            if(
               $condition == '&&' || 
               $condition == '||'
            ){
                $result[] = $condition;
            }else if(
                $condition == 'true' ||
                $condition == 'false'
            ){
                $result[] = $condition == 'true' ? true : false;
            }else if(
                $condition == '1' ||
                $condition == '0'
            ){
                $result[] = $condition == 1 ? true : false;
            }else{
                $result[] = self::condition($condition);
            }
        }
        return self::giveMeBoolean($result);
    }

    public static function condition($data)
    {
        $condition = preg_split( "/(===|==|!==|!=|<>|>=|>|<=|<)/", $data, -1, PREG_SPLIT_DELIM_CAPTURE);
        try{
            switch ($condition[1]) {
                case '===':
                    return $condition[0] === $condition[2];
                case '==':
                    return $condition[0] == $condition[2];
                case '!==':
                    return $condition[0] !== $condition[2];
                case '!=':
                    return $condition[0] != $condition[2];
                case '<>':
                    return $condition[0] <> $condition[2];
                case '>=':
                    return $condition[0] >= $condition[2];
                case '>':
                    return $condition[0] > $condition[2];
                case '<=':
                    return $condition[0] <= $condition[2];
                case '<':
                    return $condition[0] < $condition[2];
            }
        }catch (ErrorException $e) {
            throw new NotFoundHttpException('Укажите правильное условие');
        }
        
    }

    public static function giveMeBoolean($array)
    {
        if(!empty($array) && count($array) >= 3){
            if($array[1] == '&&')
            {
                $result = $array[0] && $array[2];
            }
            else if($array[1] == '||')
            {
                $result = $array[0] || $array[2];
            }
            foreach ($array as $a => $arr) {
                if($a > 3 && $a % 2 == 0){
                    if($array[--$a] == '&&'){
                        $result = $result && $arr;
                    }else if ($array[++$a] == '||') {
                        $result = $result || $arr;
                    }
                }
            }
            return $result;
        }else{
            return $array[0];
        }
    }
}
