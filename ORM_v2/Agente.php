<?php

class Agente implements Databaseable
{
    use WithDatabaseable;

    protected $id;
    protected $multa;
    protected $data;

    public function __construct(array $parameters)
    {
        $properties = array_keys(get_class_vars(get_class()));
        foreach ($parameters as $key => $parameter) {
            if (in_array($key, $properties)) {
                $this->{$key} = $parameter;
            }
        }    
    }
}