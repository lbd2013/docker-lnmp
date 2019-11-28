<?php
echo "执行以下语句，安装beanstalk php库，（库 github地址 ：https://github.com/pheanstalk/pheanstalk）</br>";
echo "docker exec php composer require pda/pheanstalk </br>";
echo "//docker exec php composer update -vvv </br>";


// Hopefully you're using Composer autoloading.
include_once "vendor/autoload.php";
use Pheanstalk\Pheanstalk;

// Create using autodetection of socket implementation
$pheanstalk = Pheanstalk::create('beanstalkd');

// ----------------------------------------
// producer (queues jobs)

$database = isset($_GET['database']) ? $_GET['database'] : 'default';
$value    = isset($_GET['value']) ? $_GET['value'] : 'test';

$pheanstalk
    ->useTube($database)
    ->put($value);

// ----------------------------------------
// worker (performs jobs)

$job = $pheanstalk
    ->watch($database)
    ->ignore($value)
    ->reserve();

echo $job->getData();

//$pheanstalk->delete($job);