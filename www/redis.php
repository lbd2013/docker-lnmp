<?php
$redis = new Redis();
$redis->connect('redis',6379);
$key = isset($_GET['key']) ? $_GET['key'] : 'test';
$value = isset($_GET['value']) ? $_GET['value'] : 'hello world!';
$redis->set($key, $value);
echo $redis->get($key);
