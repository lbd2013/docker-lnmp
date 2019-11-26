<?php
$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];
$manager = new MongoDB\Driver\Manager("mongodb://root:1234567@mongod/admin:27017?authSource=admin");

if (!isset($_GET['type']) || $_GET['type'] == 'write') {
    // 插入数据
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['x' => 1, 'name' => 'test', 'url' => 'http://www.runoob.com']);
    $bulk->insert(['x' => 2, 'name' => 'Google', 'url' => 'http://www.google.com']);
    $bulk->insert(['x' => 3, 'name' => 'taobao', 'url' => 'http://www.taobao.com']);
    $manager->executeBulkWrite('admin.sites', $bulk);
    var_dump( "写入成功");
} else {
    // 查询数据
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('admin.sites', $query);

    foreach ($cursor as $document) {
        print_r($document);
    }
    var_dump( "读取成功");
}