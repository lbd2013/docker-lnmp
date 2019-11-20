<?php

$redis = new Redis();
$redis->connect('redis',6379);
$redis->set(isset($_GET['key']) ? $_GET['key'] : 'test',isset($_GET['value']) ? $_GET['value'] : 'hello world!');
echo $redis->get($_GET['key']);
