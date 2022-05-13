<?php

require_once 'Morada.php';
require_once 'Agente.php';
require_once 'Modelo.php';

class Agencia
{
    public $modelos;
    public $agentes;
    public $fotografos;
    public $moradas;
    public $trabalhos;

    public function __construct()
    {
        $this->modelos = [];
        $this->agentes = [];
        $this->moradas = [];
        $this->trabalhos = [];        
    }

    public function adicionarModelo(Modelo $modelo)
    {
        $this->modelos[] = $modelo;
        $modelo->codigo = count($this->modelos);
    }

    public function adicionarMorada(Morada $morada)
    {
        $this->moradas[] = $morada;
        $morada->codigo = count($this->moradas);
    }

    public function adicionarAgente(Agente $agente)
    {
        $this->agentes[] = $agente;
        $agente->codigo = count($this->agentes);
    }

    public function exportar()
    {
            $ficheiro = fopen("modelos.txt", "w") or die("Não foi possível criar o ficheiro!");
            // modelos
            foreach($this->modelos as $modelo) {
                fwrite($ficheiro, $modelo->exportar() . "\n");
            }
            fclose($ficheiro);

            // a mesma coisa para os moradas
            $ficheiro = fopen("moradas.txt", "w") or die("Não foi possível criar o ficheiro!");
            // modelos
            foreach($this->moradas as $morada) {
                fwrite($ficheiro, $morada->exportar() . "\n");
            }
            fclose($ficheiro);

            // para os agentes
            $ficheiro = fopen("agentes.txt", "w") or die("Não foi possível criar o ficheiro!");
            // modelos
            foreach($this->agentes as $agente) {
                fwrite($ficheiro, $agente->exportar() . "\n");
            }
            fclose($ficheiro);

            // para os trabalhos
    }

    public function importar()
    {
        $modelos = fopen("modelos.txt", "r") or die("Unable to open file!");
        while (!feof($modelos)) {
            $m = new Modelo('', 0, '', '', '','','','','','');
            $this->modelos[] = $m->importar(fgets($modelos));
        }

        $moradas = fopen("moradas.txt", "r") or die("Unable to open file!");
        while (!feof($moradas)) {
            $m = new Morada('', '', '', '', '');
            $this->moradas[] = $m->importar(fgets($moradas));
        }
    }
}