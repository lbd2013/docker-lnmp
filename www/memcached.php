<?php
error_reporting(E_ALL);
$mc = new Memcached();
$mc->addServer("memcached", 11211);

$key = isset($_GET['key']) ? $_GET['key'] : 'name';
$value = isset($_GET['value']) ? $_GET['value'] : 'droidos';
$flag = $mc->add($key,$value);
echo ($flag)?'y':'n';
echo "</br>";
echo $mc->getResultCode();
echo "</br>";

var_dump($mc->getAllKeys());
echo "</br>";
var_dump($mc->get($key));