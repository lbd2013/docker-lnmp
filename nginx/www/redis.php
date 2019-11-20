<?php

$redis = new Redis();
$redis->connect('redis',6379);
$redis->set(isset($_GET['key']) ? $_GET['key'] : 'test','hello world!');
echo $redis->get('test');
