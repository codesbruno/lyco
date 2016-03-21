<?php
namespace lyco\helpers;

use Dflydev\DotAccessData\Data;

class Array_Helper
{
    /**
     * Return a value from array or default value. 
     * Dot notation can be used
     * 
     * @param array $array
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public static function get_array_var(array $array, $key, $default=null) 
    {
        if(strpos($key, '.') > 0){
          $d = new Data($array);
          return $d->get($key, $default);
        }
        
        return isset($array[$key]) ? $array[$key] : $default;
    }
}