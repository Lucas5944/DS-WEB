<?php


abstract class Animal {

    
    abstract public function fazerSom();

    
    public function mover() {
        return "Move-se";
    }
}


class Sapo extends Animal {

    public function fazerSom() {
        return "Coax!";
    }

    public function mover() {
        return "Salta";
    }
}


class Cavalo extends Animal {

    public function fazerSom() {
        return "Relincha!";
    }

    public function mover() {
        return parent::mover() . " e galopa";
    }
}


class Tartaruga extends Animal {

    public function fazerSom() {
        return "Som baixo...";
    }

    public function mover() {
        return "Anda lentamente";
    }
}


$animais = [
    new Sapo(),
    new Cavalo(),
    new Tartaruga()
];

foreach ($animais as $animal) {
    echo "Animal: " . get_class($animal) . "<br>";
    echo "Som: " . $animal->fazerSom() . "<br>";
    echo "Movimento: " . $animal->mover() . "<br><br>";
}

?>