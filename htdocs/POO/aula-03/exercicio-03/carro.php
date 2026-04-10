<?php
class fabricante {
    public $nome;
    public $PaisOrigem;

    public function __construct($novoNome, $novoPaisOrigem) {
        $this->nome = $novoNome;   
        $this->genero = $novoPaisOrigem; 
    }

    public function exibirDados() {
         return "Nome da fabricante : " . $this->nome . " | pais de irigem da marca: " . $this->genero;
    }   
}

class motor {
    public $Potencia;
    public $Combustivel;


    public function __construct($novoPotencia, $novoCambustivel) {
        $this->Potencia = $novoPotencia;   
        $this->Combustivel = $novoCambustivel; 
    }

    public function exibirDados() {
         return "potemcia do carro : " . $this->Potencia . " | tipo de combustivem: " . $this->Combustivel;
    }   
}

class carro {
    public $Modelo;
    public $Ano;
    public $Fabricante;
    public $Motor;

 public function __construct($novoModelo, $novoAno) {
        $this->Modelo = $novoModelo;   
        $this->Ano = $novoAno; 
    }

    public function exibirDados() {
         return "modelo do carro : " . $this->Modelo . " | ano de fabricação: " . $this->Ano;
    }   

    
}

$Fabricante  = new fabricante("Honda", "Japão");
echo $Fabricante->exibirDados();

$motor  = new motor("150CV", "flex");
echo '<br>';
echo $motor->exibirDados();

$carro  = new carro("civic", 2024);
echo '<br>';
echo $carro->exibirDados();

?>