<?php

require_once('MyConnect.php');
require_once('Databaseable.php');
require_once('Fotografo.php');

$fotografo = new Fotografo("josé", 'Rua direita', '999999990');

if ($fotografo->save()) {
    echo "Fotografo gravado com id: " . $fotografo->getId();
} else {
    echo "Ocorreu um erro a gravar o fotografo";
}


$f = Fotografo::get(2);
var_dump($f);



$fotografos = Fotografo::search(['nome', 'nif'], ['=', '!='], ['jose', '123']);
