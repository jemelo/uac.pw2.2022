<?php

class Modelo extends Colaborador
{
    public $sexo;
    public $nacionalidade;
    public $altura;
    public $medida1;
    public $medida2;
    public $medida3;
    public $codAgente;
    public $codMorada;


    public function __construct(string $nome, int $codMorada, string $contacto, 
        string $nif, string $sexo, string $nacionalidade, float $altura, 
        float $medida1, float $medida2, float $medida3, int $codAgente = 0)
    {
        parent::__construct($nome, $codMorada, $contacto, $nif);

        $this->sexo = $sexo;
        $this->nacionalidade = $nacionalidade;
        $this->altura = $altura;
        $this->medida1 = $medida1;
        $this->medida1 = $medida2;
        $this->medida1 = $medida3;
        $this->codAgente = $codAgente;
        $this->codMorada = $codMorada;
    }

    public function exportar(): string
    {
        return $this->codigo . ";" . $this->nome . ";" . $this->codMorada 
         .";" . $this->contacto . ";" . $this->nif . ";" . $this->sexo . ";"
         . $this->nacionalidade . ";" . $this->medida1 . ";" . $this->medida2.
         ";" . $this->medida3 . ";" . $this->codAgente . ";" . $this->codMorada;
    }

    public function importar(string $modelo): void
    {
        $elementos = explode(";", $modelo);
        $this->codigo = $elementos[0];
        $this->nome = $elementos[1];
        $this->codMorada = $elementos[2];
        $this->contacto = $elementos[3];
        $this->nif = $elementos[4];
        $this->sexo = $elementos[5];

        $this->nacionalidade = $elementos[6];
        $this->medida1 = $elementos[7];
        $this->medida2 = $elementos[8];
        $this->medida3 = $elementos[9];
        $this->codAgente = $elementos[10];
        $this->codMorada = $elementos[11];
    }

}