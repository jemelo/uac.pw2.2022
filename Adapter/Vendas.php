<?php

class Vendas
{
    protected $filename;
    protected $file;

    public function __construct(string $filename = 'vendas_csv.txt')
    {
        $this->filename = $filename;
        $this->file = fopen($this->filename, "r");
    }

    /**
     * Devolver as vendas no formato de dados preciso para a biblioteca de graficos que estamos a usar
     *
     * @return string
     */
    public function getVendas(): string
    {
        //return fread($this->file, 1000);

        $dados = [];
        while (($linha = fgets($this->file)) !== false) {
            $valores = explode(";", trim($linha));
            $dados[] = [
                'label' => $valores[0],
                'y' => (float) $valores[1]
            ];
        }

        return json_encode($dados);
    }

}