<?php
class Arduino {
    private $porta;

    public function __construct($porta){
        $this->porta = $porta;
    }

    $cmd ="echo " . $comando . " > " .$this->porta;
    exec($cmd)
}

public function ligar(){
    $this->enviarComando("L");
}
public function ligar(){
    $this->enviarComando("D");
}
?>