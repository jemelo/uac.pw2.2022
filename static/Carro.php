<?php

class Carro
{
    protected string $modelo;
    protected string $marca;

    

    /**
     * Devolve o consumo em litros aos 100
     *
     * @param float $litros
     * @param float $kms
     * @return float
     */
    public static function consumo(float $litros, float $kms): float
    {
        return $litros * 100 / $kms;
    }


    /**
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
}