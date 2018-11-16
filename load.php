<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 13:31
 */

include "modules/config.php";
$config = new \eminEngine\config();
define("def_lang", $config->get("global", "engine")->lang);
define("theme", $config->get("theme", "theme")->sysname);

include "modules/themelang.php";
include "modules/theme.php";
include "modules/cache.php";
include "modules/database.php";
include "modules/lang.php";
include "sys/eminEngine.php";

