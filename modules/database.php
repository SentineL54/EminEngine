<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 03:17
 */

namespace eminEngine;


class database
{
public $connection;
public function __construct($db = "default")
{
    $config = new config();
    $dongu = $config->get("global", "database");
    $dongu = $dongu->{$db}[0];
    $this->connection= mysqli_connect($dongu->ip, $dongu->user, $dongu->pass, $dongu->db);
    if($this->connection === false){
        $engine = new eminEngine();
        $lang = new lang();
        $engine->errorReport("DBERR", $lang->get( "dberr"));
    }
}
}