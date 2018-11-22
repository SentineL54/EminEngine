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
        if(isset($_GET["flushcache"])) $this->clear();
    }
    function clear(){
        switch ($this->cacheType){
            case "memcached":
                $mem  = new \Memcached();
                $mem->addServer('127.0.0.1',11211);

                break;
            case "file":
                array_map('unlink', glob("cache/global/*"));
                break;
            case "mysql":

                break;
        }
    }
    function getCache($id, $cat = "global"){
        switch ($this->cacheType){
            case "memcached":
                $mem  = new \Memcached();
                $mem->addServer('127.0.0.1',11211);

                break;
            case "file":
                return file_get_contents("cache/$cat/$id");
                break;
            case "mysql":

                break;
        }
    }
    function createCache($id, $data, $cat = "global"){
        switch ($this->cacheType){
            case "memcached":
                $mem  = new \Memcache();

                $mem->addServer('127.0.0.1',11211);
                break;
            case "file":
               if(!file_exists("cache/$cat")){
                    mkdir("cache/$cat");
               }
               file_put_contents("cache/$cat/$id", $data);
                break;
            case "mysql":

                break;
        }

    }
    function cacheStatus($id, $cat = "global"){
        switch ($this->cacheType){
            case "memcached":
                $mem  = new \Memcached();
                $mem->addServer('127.0.0.1',11211);

                break;
            case "file":
                if(file_exists("cache/$cat/$id")) return true; else return false;
                break;
            case "mysql":

                break;
        }
    }
    function delCache($id, $cat = "global"){
        switch ($this->cacheType){
            case "memcached":
                $mem  = new \Memcached();
                $mem->addServer('127.0.0.1',11211);

                break;
            case "file":
                unlink("cache/$cat/$id");
                break;
            case "mysql":

                break;
        }
    }
}