<?php

class Colaborador
{
    protected $nome;
    protected $nif;

    public function __construct(string $nome, string $nif)
    {
        $this->nome = $nome;
        $this->nif = $nif;
    }

    
}