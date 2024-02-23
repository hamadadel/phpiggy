<?php
include __DIR__.'/src/Framework/Database.php';
use Framework\Database;
$db = new Database('mysql', [
    'host'=>'127.0.0.1',
    'port'=>3306,
    'dbname'=>'workopia'
], 'workopia', 'Workopia@2024');


//try{
//    $db->connection->beginTransaction();
//    $stmt = $db->connection->query("INSERT INTO test_new");
//    $stmt->execute();
//    $db->connection->commit();
//}catch (PDOException $e) {
//    if($db->connection->inTransaction()) {
//        $db->connection->rollBack();
//    }
//    die('transaction failed '.$e->getMessage());
//}
$sqlFile = file_get_contents('database.sql');
$db->connection->query($sqlFile);