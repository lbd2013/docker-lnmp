<?php
//执行以下语句，安装beanstalk php库，github地址（https://github.com/pheanstalk/pheanstalk）
//docker exec php composer require pda/pheanstalk
//docker exec php composer update -vvv


// Hopefully you're using Composer autoloading.
include_once "vendor/autoload.php";
use Pheanstalk\Pheanstalk;

// Create using autodetection of socket implementation
$pheanstalk = Pheanstalk::create('127.0.0.1');

// ----------------------------------------
// producer (queues jobs)

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

//$pheanstalk->delete($job);