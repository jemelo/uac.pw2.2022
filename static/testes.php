<?php

require_once 'Carro.php';

//$carro = new Carro();
//echo $carro->consumo(5, 100);

echo Carro::consumo(12, 180);

echo Carro::getModelo();