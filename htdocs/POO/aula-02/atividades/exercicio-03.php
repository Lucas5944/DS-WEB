<?php    
class Veiculo {
    public $marca;
    public $modelo;
    private $velocidade;

   
    public function setVelocidade($velocidade) {
        if ($velocidade >= 0) {
            $this->velocidade = $velocidade;
        }
    }

    
    public function getVelocidade() {
        return $this->velocidade;
    }

   
    public function acelerar() {
    }
}


class Carro extends Veiculo {

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 10;
        $this->setVelocidade($novaVelocidade);
    }
}


class Moto extends Veiculo {

    public function acelerar() {
        
        $novaVelocidade = $this->getVelocidade() + 20;
        $this->setVelocidade($novaVelocidade);
    }
}



$carro = new Carro();
$carro->marca = "BMW";
$carro->modelo = "M3";
$carro->setVelocidade(0);

$moto = new Moto();
$moto->marca = "Honda";
$moto->modelo = "CB 500";
$moto->setVelocidade(0);


$carro->acelerar();
$moto->acelerar();


echo " CARRO <br>";
echo "Marca: " . $carro->marca . "<br>";
echo "Modelo: " . $carro->modelo . "<br>";
echo "Velocidade: " . $carro->getVelocidade() . " km/h<br><br>";

echo " MOTO <br>";
echo "Marca: " . $moto->marca . "<br>";
echo "Modelo: " . $moto->modelo . "<br>";
echo "Velocidade: " . $moto->getVelocidade() . " km/h<br>";

?>