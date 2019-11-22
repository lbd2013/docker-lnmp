<?php
error_reporting(E_ALL);
header('Content-type:text/plain');
$mc = new Memcached();
$mc->addServer("memcached", 11211);

$flag = $mc->add('name','droidos');
echo 1;
echo ($flag)?'y':'n';
echo $mc->getResultCode();