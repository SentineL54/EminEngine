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
public function __construct()
{
    $config = new config();
    $dongu = $config->get("global", "database");
    $this->connection= mysqli_connect($dongu->ip, $dongu->user, $dongu->pass, $dongu->db);
}
}