<?php
class pessoa {
    public $nome;
    public $idade;


    public function __construct($novoNome, $novoIdade){
        $this-> $nome = $novoNome;
        $this-> $nome = $novoNome;
    }
 
    public function exibirDados(){
        return "o nome da pessoa e " .$this->nome "e a idade e".$this->idade;
    }   

    public function alterarDados($novoNome, $novoIdade){
        $this-> $nome = $novoNome;
        $this-> $nome = $novoNome;
    }

}

$pessoa  = new pessoa("Lucas", 16);
echo $pessoa->exibirDados();

$pessoa  = new pessoa("Bruno", 32);
echo '<br>'
echo $pessoa->exibirDados();
