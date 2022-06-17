<?php

require_once('Textable.php');
require_once('Htmlable.php');
require_once('Colaborador.php');



$colaboradores[] = new Colaborador('jose', '123', 'rua');
$colaboradores[] = new Colaborador('joao', '123', 'rua');
$colaboradores[] = new Colaborador('antonio', '123', 'rua');
$colaboradores[] = new Colaborador('manuel', '123', 'rua');

function writeToFile(Textable $result)
{
    $file = fopen("ficheiro.txt", "a");
    fwrite($file, $result->toText() . "\n");
    fclose($file);
}


function writeAll(array $results)
{
    foreach ($results as $result) {
        writeToFile($result);
    }
}

function showAllColaboradores($results)
{
    foreach ($results as $result) {
        echo $result->toHTML();
    }
}

//writeAll($colaboradores);
showAllColaboradores($colaboradores);