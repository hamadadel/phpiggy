<?php
include __DIR__.'/src/Framework/Database.php';
use Framework\Database;
$db = new Database('mysql', [
    'host'=>'127.0.0.1',
    'port'=>3306,
    'dbname'=>'myapp'
], 'root', 'hamad@SWE93');
$name= "hamadadelasslaslas' OR 1=1 -- ";
$sql = "SELECT * from users where username = '{$name}'";
echo $sql.PHP_EOL;
var_dump($db->connection->prepare($sql)->execute());