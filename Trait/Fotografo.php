<?php

class Fotografo extends Colaborador implements Printable
{
    use WithPrintable;

    protected string $dataInicio;

    public function __construct(string $nome, string $nif, string $dataInicio)
    {
        parent::__construct($nome, $nif);
        
        $this->dataInicio = $dataInicio;
    }
}