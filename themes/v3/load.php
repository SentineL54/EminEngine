<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 17.11.2018
 * Time: 01:57
 */


define("themever", "0");
define("themename", "V3 Test Teması");
$istek = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
$istekler = explode("/", $istek);

switch ($istekler[0]){
    case "":
        include "anasayfa.php";
        die;
        break;
    case "profil":
        include "profil.php";
        die;
        break;
}
include "anasayfa.php";
