<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 16.11.2018
 * Time: 03:17
 */

namespace eminEngine;


class cache
{
    private $cacheType;
    private $cacheHost;
    private $user;
    private $pass;
    private $db;
    private $table;
    public function __construct()
    {
        $config = new config();
        $config = $config->get("modules", "cache");
        $this->cacheType = $config->type;
        $this->cacheHost = $config->ip;
        $this->user = $config->user;
        $this->pass = $config->pass;
        $this->db = $config->db;
        $this->table = $config->table;
    }

    function getCache(){

    }
    function createCache(){

    }
    function cacheStatus(){

    }
    function delCache(){

    }
}