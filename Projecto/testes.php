<?php

require_once 'Morada.php';
require_once 'Agencia.php';
require_once 'Colaborador.php';
require_once 'Modelo.php';
require_once 'Agente.php';

$agencia = new Agencia();

$morada = new Morada('Rua principal', '1A', '9500-123', 'Ponta Delgada', 
    'Portugal');

// var_dump($morada);
$agencia->adicionarMorada($morada);
//var_dump($morada);
$morada2 = new Morada('','','','','');
$agencia->adicionarMorada($morada2);
//var_dump($morada2);

$modelo = new Modelo('Joana', $morada->codigo, '123', '99999', 'Feminino', 
    'Francesa', 1.69, 1, 2, 3);
$agencia->adicionarModelo($modelo);

$agente = new Agente('Jorge Mendes', $morada2->codigo, '123', '99999', '1986-01-02');
$agencia->adicionarAgente($agente);

$modelo = new Modelo('Roberta', $morada2->codigo, '123', '999000', 'Feminino', 
    'Italiana', 1.75, 1, 2, 3, 1);
$agencia->adicionarModelo($modelo);


$agencia->exportar();
