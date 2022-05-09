<?php

require_once 'Morada.php';
require_once 'Agencia.php';
require_once 'Colaborador.php';
require_once 'Modelo.php';


$morada = new Morada('Rua principal', '1A', '9500-123', 'Ponta Delgada', 
    'Portugal');

echo $morada->exportar();

$morada2 = new Morada('','','','','');
var_dump($morada2);
$morada2->importar($morada->exportar());
var_dump($morada2);

$modelo = new Modelo('Joana', $morada, '123', '99999', 'Masculino', 'Francesa', 
    1.89, 1, 2, 3);

$agencia = new Agencia();
$agencia->adicionarModelo($modelo);
$agencia->exportar();

