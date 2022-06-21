<?php

require_once('WithDatabaseable.php');
require_once('MyConnect.php');
require_once('Databaseable.php');
require_once('Fotografo.php');
require_once('Agente.php');

$fotografo = new Fotografo("josé", 'Rua direita', '999999990');
//var_dump($fotografo);


if ($fotografo->save()) {
    echo "Fotografo gravado com id: " . $fotografo->getId() . "\n";
} else {
    echo "Ocorreu um erro a gravar o fotografo\n";
}

$agente = new Agente('excesso de velocidade', 'hoje');
if ($agente->save()) {
    echo "Agente gravado com id: " . $agente->getId() . "\n";
} else {
    echo "Ocorreu um erro a gravar o agente\n";
}

$fotografo->search(['nome', 'nif'], ['!=', 'like'], ['antonio', '%bana%']);