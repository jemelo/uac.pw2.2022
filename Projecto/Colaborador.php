<?php

class Colaborador
{
    public $codigo;
    public $nome;
    public $codMorada;
    public $contacto;
    public $nif;

    public function __construct(string $nome, int $codMorada, string $contacto, string $nif)
    {
        $this->nome = $nome;
        $this->morada = $codMorada;
        $this->contacto = $contacto;
        $this->nif = $nif;
    }

    // o resto das coisas

}