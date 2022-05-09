<?php

require_once 'Morada.php';

class Agencia
{
    public $modelos;
    public $agentes;
    public $fotografos;
    public $colaboradores;

    public function __construct()
    {
        $this->modelos = [];
        $this->agentes = [];
        // os outros tambem
    }

    public function adicionarModelo(Modelo $modelo)
    {
        $this->modelos[] = $modelo;
    }

    public function exportar()
    {
            $ficheiro = fopen("modelos.txt", "w") or die("Não foi possível criar o ficheiro!");
            // modelos
            foreach($this->modelos as $modelo) {
                fwrite($ficheiro, $modelo->exportar() . "\n");
            }
            fclose($ficheiro);

            // a mesma coisa para os agentes

            // para os fotografos

            // para os trabalhos


    }

    public function importar()
    {
        $modelos = fopen("modelos.txt", "r") or die("Unable to open file!");
        while (!feof($modelos)) {
            $m = new Modelo('', null, '', '', '','','','','','');
            $this->modelos[] = $m->importar(fgets($modelos));
        }

    }
}