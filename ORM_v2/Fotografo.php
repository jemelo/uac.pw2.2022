<?php

require_once('Databaseable.php');
require_once('MyConnect.php');

class Fotografo implements Databaseable
{
    use WithDatabaseable;

    protected $id;
    protected $nome;
    protected $morada;
    protected $nif;

    public function __construct(string $nome, string $morada, string $nif)
    {
        $this->nome = $nome;
        $this->morada = $morada;
        $this->nif = $nif;
    }

}