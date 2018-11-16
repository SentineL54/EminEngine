<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 15:28
 */

namespace eminEngine;


class lang
{
    function get($id, $lang = def_lang){
        $json = json_decode(file_get_contents("lang/".$lang.".json"));
        return $json->{"string"}[0]->{$id};
    }
}