<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 17.11.2018
 * Time: 02:08
 */

namespace eminEngine;


class themelang
{
    function get($id, $lang = def_lang){
        $json = json_decode(file_get_contents("themes/".theme."/lang/".$lang.".json"));
        return $json->{"string"}[0]->{$id};
    }
}