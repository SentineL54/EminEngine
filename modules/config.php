<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 14:55
 */

namespace eminEngine;

class config{
    function get($module, $config){
        $json = json_decode(file_get_contents("conf/".$module.".json"));
        return $json->{$config}[0];
    }
}