<?php

class Colaborador
{
    public $codigo;
    public $nome;
    public $codMorada;
    public $contacto;
    public $nif;

    public function __construct(string $nome, string $codMorada, string $contacto, string $nif)
    {
        $this->nome = $nome;
        $this->morada = $codMorada;
        $this->contacto = $contacto;
        $this->nif = $nif;
    }

    
    public function toString(): string
    {
        return "Nome:" . $this->nome . "\n\tMorada: " . $this->morada . "\n\tContacto: "
             . $this->contacto . "\n\tNif: " . $this->nif . "\n"; 

  
    }



    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
}