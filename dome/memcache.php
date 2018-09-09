<?php
use LSYS\Memcached\DI;
include __DIR__."/Bootstarp.php";

// $r=new \LSYS\Memcached(new LSYS\Config\File("memcached.default"));
// print_r($r->configServers());

$r=DI::get()->memcached()->configServers();

var_dump($r->set('hi','aa'));
var_dump($r->get('hi'));