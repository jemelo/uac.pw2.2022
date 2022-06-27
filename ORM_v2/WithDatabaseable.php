<?php

trait WithDatabaseable
{
    /**
     * Devolve o object pesquisando por id na tabela 
     *
     * @param integer $id
     * @return Databaseable
     */
    public static function get(int $id): Databaseable
    {
        $table = strtolower(get_class());
        $connection = MyConnect::getInstance();

        $sql = "select * from " . $table . " where id = " . $id . ";";
        $result = $connection->query($sql);
        if ($result->num_rows == 0) {
            return false;
        }

        $row = $result->fetch_assoc();
        $class = get_class();
        return new $class($row);
    }

    /**
     * insere o objecto na base de dados
     *
     * @return boolean
     */
    public function save(): bool
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();
        
        // construir a query para inserir este objecto
        $sql = "insert into " . $table . "(";

        $properties = get_class_vars(get_class());
        unset($properties['id']);
        $properties = array_keys($properties);
        foreach ($properties as $i => $property) {
            $sql .= $property;

            if ($i < count($properties)-1) {
                $sql .= ",";
            }
        }
        $sql .= ") values (";

        reset($properties);
        foreach ($properties as $i => $property) {
            $sql .= "'" . $this->$property ."'";

            if ($i < count($properties)-1) {
                $sql .= ",";
            }
        }
        $sql .= ");";

        $ret = $connection->query($sql);
        if ($ret) {
            $this->id = $connection->getInsertID();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Pesquisa na tabela por elementos
     *
     * @param array $colunas
     * @param array $operadores
     * @param array $valores
     * @return array
     */
    public static function search(array $colunas, array $operadores, array $valores): array
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();

        $sql = "select * from " . $table;
        if (count($colunas) > 0) {
            $sql .=  " where ";
        }
        foreach ($colunas as $i => $coluna) {
            $sql .= $coluna . " " . $operadores[$i] . " '". $valores[$i] . "' ";

            if ($i < count($colunas) - 1) {
                $sql .= " and ";
            }
        }

        $results = $connection->query($sql); 
        if ($results->rowCount() == 0) {
            return [];
        }


        $class = get_class();
        $properties = get_class_vars(get_class());
        $properties = array_keys($properties);
        $objects = [];
        while($row = $results->fetch()){
            $objects[] = new $class($row);
            
        }

        return $objects;
    }


    /**
     * Delete row by id
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $table = strtolower(get_class());
        $connection = MyConnect::getInstance();

        $sql = "delete from " . $table . " where id = " . $id;
        $result = $connection->query($sql);

        return $result === false ? false : true;
    }

    /**
     * Actualiza os dados do objecto em base de dados
     *
     * @return boolean
     */
    public function update(): bool
    {
        $table = strtolower(get_class()); 
        $connection = MyConnect::getInstance();
        
        // construir a query para actualizar este objecto
        $sql = "update " . $table . " set ";

        $properties = get_class_vars(get_class());
        $properties = array_keys($properties);
        foreach ($properties as $i => $property) {
            $sql .= $property . " = '" . $this->{$property} . "'";

            if ($i < count($properties)-1) {
                $sql .= ", ";
            }
        }
        $sql .= " where id = " . $this->id;

        $ret = $connection->query($sql);
        return $ret === false ? false : true;
    }
}