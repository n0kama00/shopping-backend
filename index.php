<?php
require_once 'incc/func.php';
require_once 'incc/head.php';

if ($_SERVER['REQUEST_METHOD']=== 'OPTIONS') {
    return 0;
}

try {
$db = openDb();
$sql = "select * from item";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
} catch (PDOException $pdoex) {
returnError($pdoex);
}