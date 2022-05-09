<?php

class Modelo extends Colaborador
{
    public $sexo;
    public $nacionalidade;
    public $altura;
    public $medida1;
    public $medida2;
    public $medida3;

    public function __construct(string $nome, Morada $morada, string $contacto, 
        string $nif, string $sexo, string $nacionalidade, float $altura, 
        float $medida1, float $medida2, float $medida3)
    {
        parent::__construct($nome, $morada, $contacto, $nif);

        $this->sexo = $sexo;
        $this->nacionalidade = $nacionalidade;
        $this->altura = $altura;
        $this->medida1 = $medida1;
        $this->medida1 = $medida2;
        $this->medida1 = $medida3;
    }

    public function exportar(): string
    {
        return $this->codigo . ";" . $this->nome . ";" . $this->morada->exportar()
         .";" ;
    }

    public function importar(string $modelo): void
    {
        // o mesmo que a morada
    }

}