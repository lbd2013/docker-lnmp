<?php
$connection = new Mongo("mongodb://root:1234567@mongod/admin:27017?authSource=admin"); 
var_dump($connection->listDBs());//打印出数据库数组
