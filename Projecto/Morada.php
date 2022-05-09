<?php

class Morada
{
    public $rua;
    public $porta;
    public $codigoPostal;
    public $cidade;
    public $pais;

    public function __construct(string $rua, string $porta, string $codigoPostal, 
        string $cidade, string $pais)
    {
        $this->rua = $rua;
        $this->porta = $porta;
        $this->codigoPostal = $codigoPostal;
        $this->cidade = $cidade;
        $this->pais = $pais;
    }

    public function exportar(): string
    {
        return $this->rua . "." . $this->porta . "." . $this->codigoPostal
            . "." . $this->cidade . "." . $this->pais;
    }

    public function importar(string $morada)
    {
        $elementos = explode(".", $morada);
        $this->rua = $elementos[0];
        $this->porta = $elementos[1];
        $this->codigoPostal = $elementos[2];
        $this->cidade = $elementos[3];
        $this->pais = $elementos[4];
    }
}