<?php

class Agente implements Databaseable
{
    use WithDatabaseable;

    protected $id;
    protected $multa;
    protected $data;

    public function __construct(string $multa, string $data)
    {
        $this->multa = $multa;
        $this->data = $data;
    }
}