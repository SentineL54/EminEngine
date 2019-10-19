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
    static function limitCallSlowDown($key, $limit, $slowPower, $timestamp){
        $key .= $_SERVER["REMOTE_ADDR"];
        if(apcu_exists($key)){
            if(apcu_fetch($key) > $limit) {
                $no = apcu_fetch($key);
                if($no >= ($limit * 100)) die;
                $new = $no + 1;
                apcu_cas($key, $no, $new);
                $_SESSION["slowDown"] = $slowPower/10*$new;
                eminEngine::log("INFO", "limitCallSlowDown", "Yavaşlatma uygulandı.", [$slowPower/10*$new, $_SESSION, $_SERVER]);
                sleep($slowPower/10*$new);

            }else{
                $no = apcu_fetch($key);
                $new = $no + 1;
                apcu_cas($key, $no, $new);

            }
        }else{

            apcu_add($key, 1, $timestamp);
            return true;
        }
    }
    static function limitCall($key, $limit){
        if(apcu_exists($key)){
            if(apcu_fetch($key) <= $limit) {
                $no = apcu_fetch($key);
                $new = $no + 1;
                apcu_cas($key, $no, $new);
                return true;
            }else{
                return false;
            }
        }else{

            apcu_add($key, 1, 600);
            return true;
        }
    }

    static function log($state, $func, $message, $data = "", $workid = ""){



    }
    static function saniyevakit($saniye){
        return gmdate("H:i:s",$saniye);
    }
    static function randomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
    static function state_404(){
        http_response_code(404);
        include "themes/404/index.html";
        die;
    }
}