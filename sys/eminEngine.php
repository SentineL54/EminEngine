<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 03:16
 */

namespace eminEngine;


class eminEngine
{
    private $lang;
    public function __construct()
    {
        $this->lang = new lang();
    }

    function errorReport($status, $message){
    echo $this->lang->get(def_lang, "error")."($status)".": $message";
}

}