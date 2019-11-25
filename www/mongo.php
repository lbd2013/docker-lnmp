<?php
$m = new MongoClient();
$db = $m->admin;
$collection = $db->system->users;

$cursor = $collection->find();
foreach ($cursor as $document) {
    var_dump($document);
}