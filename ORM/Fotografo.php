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

    public static function get(int $id): Fotografo
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();

        $sql = "select * from " . $table . " where id = " . $id . ";";
        $result = $connection->query($sql);
        if ($result->num_rows == 0) {
            return false;
        }

        $row = $result->fetch_assoc();
        $f = new Fotografo($row['nome'], $row['morada'], $row['nif']);
        $f->setId($row['id']);
        return $f;
    }

    public function save(): bool
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();
        //var_dump($connection->query("show tables;"));
        
        // construir a query para inserir este objecto
        $sql = "insert into " . $table . " (nome, morada, nif) values ('"
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

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}