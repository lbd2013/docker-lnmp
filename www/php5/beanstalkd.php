<?php
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  </br>";
echo "执行以下语句，安装beanstalk php库，（库 github地址 ：https://github.com/pheanstalk/pheanstalk）</br>";
echo "docker exec php5 composer require pda/pheanstalk </br>";
echo "docker exec php5 composer update -vvv ";
echo "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  </br>";
echo "</br> </br> </br> </br> </br> </br> </br> </br> </br>";

// Hopefully you're using Composer autoloading.
include_once "../vendor/autoload.php";
use Pheanstalk\Pheanstalk;

// Create using autodetection of socket implementation
$pheanstalk = new Pheanstalk('beanstalkd');

$pheanstalk
    ->useTube('testtube')
    ->put("job payload goes here\n");

// ----------------------------------------
// worker (performs jobs)

$job = $pheanstalk
    ->watch('testtube')
    ->ignore('default')
    ->reserve();

echo $job->getData();

$pheanstalk->delete($job);

// ----------------------------------------
// check server availability

$pheanstalk->getConnection()->isServiceListening(); // true or false