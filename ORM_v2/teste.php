<?php

require_once('WithDatabaseable.php');
require_once('MyConnect.php');
require_once('Databaseable.php');
require_once('Fotografo.php');
require_once('Agente.php');

$fotografo = new Fotografo(['nome' => 'jose', 'morada' => 'a rua', 'nif' => '1234']);
//var_dump($fotografo);
//exit;

if ($fotografo->save()) {
    echo "Fotografo gravado com id: " . $fotografo->getId() . "\n";
} else {
    echo "Ocorreu um erro a gravar o fotografo\n";
}

$agente = new Agente(['multa' => 'Falta de educaçºao', 'data' => 'hoje']);
if ($agente->save()) {
    echo "Agente gravado com id: " . $agente->getId() . "\n";
} else {
    echo "Ocorreu um erro a gravar o agente\n";
}

$resultados =$fotografo->search(['nome', 'nif'], ['!=', 'like'], ['antonio', '%9%']);
//print_r($resultados);

$resultados_agente = $agente->search([], [], []);
//print_r($resultados);

$resultados_agente[0]->setMulta('Teste cena alterada');
if ($resultados_agente[0]->update()) {
    echo "Agente alterado com sucesso\n";
} else {
    echo "Ocorreu um erro a alterar o agente\n";
}