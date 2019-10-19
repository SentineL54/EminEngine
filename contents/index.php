<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 13:31
 */


use eminEngine\eminEngine;


include "vendor/autoload.php";
function fatal_handler()
{

    $error = error_get_last();

    if ($error !== NULL) {
        eminEngine::log("ERROR", "FATAL", "Uyarı tespit edildi", $error);
    }
}

register_shutdown_function("fatal_handler");

include "sys/eminEngine.php";
session_start();
function reqModX($modname)
{
    eminEngine::log("DEBUG", "reqModX", "Class dosyası yüklenilmediğinden ötürü fonksyon çağırıldı.", [$_SERVER['REQUEST_URI'], "modules/" . explode("\\", $modname)[1] . ".php"]);
    include "modules/" . explode("\\", $modname)[1] . ".php";
}

function reqMod(...$modname)
{
    foreach ($modname as $mod)
        include "modules/$mod.php";
}

spl_autoload_register('reqModX');
function reqModCheck(...$modname)
{
    foreach ($modname as $mod)
        require_once "modules/$mod.php";
}

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
if (isset($_GET["report"]))
    define("errorReporting", true);
else {
    define("errorReporting", false);
}



reqMod("theme");

define("cache", false);
define("allCache", false);
define("AllcacheTime", 10);

if (errorReporting) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

$config = new \eminEngine\config();
if (!isset($_GET['lang'])) define("def_lang", $config->get("global", "engine")->lang);
else
    define("def_lang", $_GET['lang']);




eminEngine::limitCallSlowDown("indexMain", 150, 1, 60);
$adres = $_SERVER['REQUEST_URI'];
$adres = (substr($adres, -1, 1) == "/" ? substr($adres, 0, -1) : $adres);
$adres = ltrim($adres, "/");
$adres = explode("?", $adres)[0];
$adresler = explode("/", $adres);
eminEngine::log("INFO", "REQUEST", $_SERVER['REQUEST_URI']." adresine istek gönderildi", [$workID, $_SERVER['HTTP_X_FORWARDED_FOR']]);
switch ($adresler[0]) {

    case "":
        if (allCache) {
            if (!apcu_exists("indexMat") && false) {
                ob_start();

                include "mainIndex.php";
                $cont = ob_get_contents();
                apcu_add("indexMat", $cont, AllcacheTime);
            } else {
                echo apcu_fetch("indexMat");
            }
        } else {


            include "mainIndex.php";
        }

        break;
    default:
        eminEngine::state_404();
        break;
}


