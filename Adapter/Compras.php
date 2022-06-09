<?php

class Compras
{
    protected $filename;
    protected $file;

    public function __construct(string $filename = 'compras_svd.txt')
    {
        $this->filename = $filename;
        $this->file = fopen($this->filename, "r");
    }

    /**
     * Devolver as compras no formato de dados preciso para a biblioteca de graficos que estamos a usar
     *
     * @return string
     */
    public function getCompras(): string
    {
        return fread($this->file, 1000);

        $dados = [
            //[y => 121212, 'indexLabel' => 'asasas']
        ];

        $i = 1;
        $dado = [ 
            'y' => 0;
            'indexLabel' => ''
        ];
    }


}