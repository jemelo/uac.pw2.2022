<?php

class MysqlConnection
{
    private $connection;

    public function __construct(string $hostname, string $user, string $password)
    {
        $this->connection = new mysqli($hostname, $user, $password, 'uac');
    }

    


    /**
     * Get the value of connection
     */ 
    public function getConnection()
    {
        return $this->connection;
    }
}