<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 17.11.2018
 * Time: 01:57
 */


define("themever", "0");
define("themename", "V3 Test Teması");
$cache = new \eminEngine\cache();
$istek = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
$istekler = explode("/", $istek);

switch ($istekler[0]){
    case "":
        if($cache->cacheStatus("anasayfa")){

           echo $cache->getCache("anasayfa");
        }else{
            ob_start();
            include "anasayfa.php";
            $cache->createCache("anasayfa", ob_get_contents());
            ob_end_flush();
        }
        break;
    case "profil":
        include "profil.php";
        break;
    default:
        include "anasayfa.php";
        break;
}

