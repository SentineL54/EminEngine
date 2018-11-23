<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 17.11.2018
 * Time: 01:45
 */
ob_start();
include "load.php";
$istek = substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
$istekler = explode("/", $istek);
$cache = new \eminEngine\cache();
$db = new \eminEngine\database();
include "themes/".theme."/load.php";
