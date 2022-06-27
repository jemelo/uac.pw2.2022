<?php

require_once 'Colaborador.php';
require_once 'WithPrintable.php';
require_once 'Printable.php';
require_once 'Fotografo.php';
require_once 'Agente.php';



$colaborador = new Colaborador('jose', '123');
var_dump($colaborador);

$fotografo = new Fotografo('joao', '321', '2022-03-02');
var_dump($fotografo);


$agente = new Agente('agente', 'rocha', '1234');
var_dump($agente);

$fotografo->print() ;
$agente->print();

$fotografos = Fotografo::search([],[],[]);
print_r($fotografos);
