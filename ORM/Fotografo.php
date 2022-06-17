<?php

require_once('Databaseable.php');
require_once('MyConnect.php');

class Fotografo implements Databaseable
{
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

    public function get(int $id): Fotografo
    {
        return $this;
    }

    public function save(): bool
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();
        //var_dump($connection->query("show tables;"));
        
        // construir a query para inserir este objecto
        $sql = "insert into fotografo (nome, morada, nif) values ('"
            . $this->nome . "','" . $this->morada . "','" . $this->nif
            . "');";

        
        $ret = $connection->query($sql);
        if ($ret) {
            $this->id = $connection->getInsertID();
            return true;
        } else {
            return false;
        }
    }

    public function search(string $search): array
    {
        return [];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}