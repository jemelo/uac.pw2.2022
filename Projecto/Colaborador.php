<?php

class Colaborador
{
    public $codigo;
    public $nome;
    public $morada;
    public $contacto;
    public $nif;

    public function __construct(string $nome, Morada $morada, string $contacto, string $nif)
    {
        $this->nome = $nome;
        $this->morada = $morada;
        $this->contacto = $contacto;
        $this->nif = $nif;
    }

    // o resto das coisas

}