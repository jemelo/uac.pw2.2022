<?php

class Agente extends Colaborador implements Printable
{
    protected string $dataFim;

    public function __construct(string $nome, string $nif, string $dataFim)
    {
        parent::__construct($nome, $nif);
        
        $this->dataFim = $dataFim;
    }


    public function print(): void
    {
        echo "classe " . get_class() . "\n";
    }
}