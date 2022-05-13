<?php

require_once 'Colaborador.php';

class Agente extends Colaborador
{
    public $dataInicio;

    public function __construct(string $nome, int $codMorada, string $contacto, 
        string $nif, string $dataInicio)
    {
        parent::__construct($nome, $codMorada, $contacto, $nif);

        $this->dataInicio = $dataInicio;
    }

    public function exportar(): string
    {
        return $this->codigo . ";" . $this->nome . ";" . $this->codMorada 
         .";" . $this->contacto . ";" . $this->nif . ";" . $this->dataInicio;
    }

    public function importar(string $agente): void
    {
        $elementos = explode(";", $agente);
        $this->codigo = $elementos[0];
        $this->nome = $elementos[1];
        $this->codMorada = $elementos[2];
        $this->contacto = $elementos[3];
        $this->nif = $elementos[4];
        $this->dataInicio = $elementos[5];
    }

}