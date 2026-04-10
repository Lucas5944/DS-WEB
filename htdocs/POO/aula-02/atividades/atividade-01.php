<?php


class Pessoa {
    private $nome;
    private $idade;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getIdade() {
        return $this->idade;
    }
}


class Funcionario extends Pessoa {
    protected $salario;

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }

    
    public function calcularBonus() {
        return 0;
    }
}


class Gerente extends Funcionario {

    public function calcularBonus() {
        return $this->salario * 0.20; // 20%
    }
}


class Desenvolvedor extends Funcionario {

    public function calcularBonus() {
        return $this->salario * 0.10; // 10%
    }
}



$gerente = new Gerente();
$gerente->setNome("bruno");
$gerente->setIdade(45);
$gerente->setSalario(10000);

$dev = new Desenvolvedor();
$dev->setNome("lucas");
$dev->setIdade(30);
$dev->setSalario(5000);

echo " GERENTE <br>";
echo "Nome: " . $gerente->getNome() . "<br>";
echo "Idade: " . $gerente->getIdade() . "<br>";
echo "Salário: R$ " . $gerente->getSalario() . "<br>";
echo "Bônus: R$ " . $gerente->calcularBonus() . "<br><br>";

echo " DESENVOLVEDOR <br>";
echo "Nome: " . $dev->getNome() . "<br>";
echo "Idade: " . $dev->getIdade() . "<br>";
echo "Salário: R$ " . $dev->getSalario() . "<br>";
echo "Bônus: R$ " . $dev->calcularBonus() . "<br>";

?>