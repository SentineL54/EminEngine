<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 13:31
 */
error_reporting(0);
include "modules/config.php";
$config = new \eminEngine\config();
define("def_lang", $config->get("global", "engine")->lang);

include "modules/cache.php";
include "modules/database.php";
include "modules/lang.php";
include "eminEngine.php";

