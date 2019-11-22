<?php
error_reporting(E_ALL);
$mc = new Memcached();
$mc->addServer("memcached", 11211);

$flag = $mc->add('name','droidos');
echo ($flag)?'y':'n';
echo "</br>";
echo $mc->getResultCode();
echo "</br>";

var_dump($mc->getAllKeys());
var_dump($mc->get('name'));