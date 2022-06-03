<?php

require_once 'MysqlConnection.php';
require_once 'MysqlConnectionSingleton.php';

$mysqlObject = new MysqlConnection('127.0.0.1', 'uac', 'testes');

$connection = $mysqlObject->getConnection();
$results = $connection->query('Select * from bananas');
//var_dump($results);

$dados = [];
$start = microtime(true);
// for($i = 0; $i < 10000; $i++) {
//     $mysqlObject = new MysqlConnection('', 'uac', 'testes');
//     $dados[] = $mysqlObject;
// }
$end = microtime(true);



$mysqlObject1 = new MysqlConnection('localhost', 'uac', 'testes');
$mysqlObject2 = new MysqlConnection('localhost', 'uac', 'testes');

echo "Ligação normal\n";
if ($mysqlObject1 == $mysqlObject2) {
    echo "São o mesmo\n";
} else {
    echo "São diferentes\n";
}

//echo $end;

//echo "tempo de execução: " . (($end - $start)) . " segundos" ; 

$connection = MysqlConnectionSingleton::getConnection();
// $results = $connection->query('Select * from bananas');
// var_dump($results);

$start = microtime(true);
for($i = 0; $i < 900000; $i++) {
    $connection = MysqlConnectionSingleton::getConnection();
    $dados[] = $connection;
}
$end = microtime(true);
echo "tempo de execução: " . (($end - $start)) . " segundos" ; 
sleep(30);