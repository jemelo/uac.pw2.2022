<?php

namespace UAC\PW2\Projecto;

use Gumlet\ImageResize;

include 'vendor/autoload.php';

echo "olá munde\n";



$image = new ImageResize('aguia.jpg');
$image->scale(10);
$image->save('aguia_muito_pequena.jpg');