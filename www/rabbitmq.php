<?php
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  </br>";
echo "执行以下语句，amqplib库，（库 github地址 ：https://github.com/php-amqplib/php-amqplib）</br>";
echo "官方hello word：https://www.rabbitmq.com/tutorials/tutorial-one-php.html </br>";

echo "docker exec php composer require php-amqplib/php-amqplib </br>";
echo "docker exec php composer update -vvv ";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  </br>";
echo "</br> </br> </br> </br> </br> </br> </br> </br> </br>";



include_once "vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";
$channel->close();
$connection->close();