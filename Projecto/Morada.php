<?php

class Morada
{
    public $rua;
    public $porta;
    public $codigoPostal;
    public $cidade;
    public $pais;
    public $codigo;

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
        return $this->codigo . ";" . $this->rua . ";" . $this->porta . ";" . $this->codigoPostal
            . ";" . $this->cidade . ";" . $this->pais;
    }

    public function importar(string $morada)
    {
        $elementos = explode(";", $morada);
        $this->codigo = $elementos[0];
        $this->rua = $elementos[1];
        $this->porta = $elementos[2];
        $this->codigoPostal = $elementos[3];
        $this->cidade = $elementos[4];
        $this->pais = $elementos[5];
    }
}