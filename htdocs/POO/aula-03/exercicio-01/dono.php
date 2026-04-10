<?php
class Dono {
    public $nome;
    public $telefone;

    public function __construct($novoNome, $novoTelefone) {
        $this->nome = $novoNome;
        $this->telefone = $novoTelefone;
    }

    public function exibirDados() {
        // Corrigido o uso dos pontos para concatenar
        return "Dono: " . $this->nome . " | Telefone: " . $this->telefone;
    }   
}

class Animal {
    public $nome;
    public $especie;
    public $dono; // Aqui vamos guardar o objeto da classe Dono

    public function __construct($novoNome, $novoEspecie, $novoDono) {
        $this->nome = $novoNome;
        $this->especie = $novoEspecie;
        $this->dono = $novoDono;
    }

    public function exibirDados() {
        // Acessamos o método do dono através do objeto $this->dono
        return "Animal: " . $this->nome . " | Espécie: " . $this->especie ;
    }   
}

// 1. Criamos o dono primeiro (telefone entre aspas)
$joao = new Dono("João", "(11) 99999-9999");

// 2. Criamos o animal e passamos o objeto $joao como o dono
$animal = new Animal("Rex", "Cachorro", $joao);

// Exibimos os dados
echo $joao->exibirDados();
echo "<br>";
echo $animal->exibirDados();
?>