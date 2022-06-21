<?php

trait WithDatabaseable
{
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
        $f = new $class($row['nome'], $row['morada'], $row['nif']);
        $f->setId($row['id']);
        return $f;
    }

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
        if ($results->num_rows == 0) {
            return [];
        }


        $class = get_class();
        $properties = get_class_vars(get_class());
        $properties = array_keys($properties);
        $objects = [];
        while($row = $results->fetch_assoc()){
            $objects[] = new $class($row);
            
        }

        return $objects;
    }


    public function delete(int $id): bool
    {
        return false;
    }

    // fazer o método update
    // incluir o getid e o setid e meter isto

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