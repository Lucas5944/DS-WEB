<?php

class Veiculo {
    public $marca;
    public $modelo;
    private $velocidade;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidade = 0;
    }

    
    public function setVelocidade($velocidade) {
        if ($velocidade >= 0) {
            $this->velocidade = $velocidade;
        }
    }

    
    public function getVelocidade() {
        return $this->velocidade;
    }

    public function exibirDados() {
        return "Marca: {$this->marca} | Modelo: {$this->modelo} | Velocidade: {$this->velocidade} km/h";
    }
}

class Carro extends Veiculo {

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 20;
        $this->setVelocidade($novaVelocidade);
        return "Carro acelerou para " . $this->getVelocidade() . " km/h";
    }
}

class Moto extends Veiculo {

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 30;
        $this->setVelocidade($novaVelocidade);
        return "Moto acelerou para " . $this->getVelocidade() . " km/h";
    }
}


$carro = new Carro("Toyota", "Corolla");
$moto = new Moto("Honda", "CB500");

echo $carro->exibirDados() . "<br>";
echo $carro->acelerar() . "<br>";
echo $carro->exibirDados() . "<br><br>";

echo $moto->exibirDados() . "<br>";
echo $moto->acelerar() . "<br>";
echo $moto->exibirDados();

?>