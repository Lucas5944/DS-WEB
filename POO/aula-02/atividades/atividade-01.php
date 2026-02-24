<?php

class Pessoa {
    private $nome;
    private $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }
}

class Funcionario extends Pessoa {
    private $salario;

    public function __construct($nome, $idade, $salario) {
        parent::__construct($nome, $idade);
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function calcularBonus() {
        return 0;
    }
}

class Gerente extends Funcionario {
    public function calcularBonus() {
        return $this->getSalario() * 0.20;
    }
}

class Desenvolvedor extends Funcionario {
    public function calcularBonus() {
        return $this->getSalario() * 0.10;
    }
}

// Testando o polimorfismo
$gerente = new Gerente("Carlos", 40, 10000);
$dev = new Desenvolvedor("Ana", 28, 6000);

echo "Gerente: " . $gerente->getNome() . "<br>";
echo "Bônus: R$ " . $gerente->calcularBonus() . "<br><br>";

echo "Desenvolvedor: " . $dev->getNome() . "<br>";
echo "Bônus: R$ " . $dev->calcularBonus();

?>