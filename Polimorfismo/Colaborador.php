<?php

class Colaborador implements Textable, Htmlable
{
    protected $nome;
    protected $nif;
    protected $contacto;

    public function __construct(string $nome, string $nif, string $contacto)
    {
        $this->nome = $nome;
        $this->nif = $nif;
        $this->contacto = $contacto;
    }



    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of nif
     */ 
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set the value of nif
     *
     * @return  self
     */ 
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get the value of contacto
     */ 
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set the value of contacto
     *
     * @return  self
     */ 
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    public function toText(): string
    {
        return $this->nome . "|" . $this->contacto . "|" . $this->nif;
    }

    public function toHTML(): string
    {
        return "<b>Nome: </b> . " . $this->nome ."<br>"
            . "<b>Contacto: </b>" . $this->contacto . "<br>"
            . "<b>Nif: </b>" . $this->nif;
    }
}