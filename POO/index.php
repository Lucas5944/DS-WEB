<?php
class tenis
{

public $calsar;
public $cor;
public $tamanho;
public $material;
public $marca;

    public function calçar(){
    
    return "você  calçar o tenis da cor".$this-> cor;
}
     public function amarrar (){
    
    return "a marca do tenis que você amarrou é ".$this-> marca; 
}
     public function andar (){
    
    return "você esta andando com o tenis do tamanho  ".$this-> tamanho; 
}


}

$t1 = new  tenis ();
$t1->cor = "  preta";
echo  $t1-> calçar(). "<br>";


$t3 = new tenis ();
$t3->tamanho = " 40";
echo $t3-> andar(). "<br>";

$t2 = new tenis ();
$t2->marca = " da adidas";
echo  $t2-> amarrar(). "<br>";


?>

<?php
class carro
{

public $dirigir;
public $cor;
public $potencia;
public $idade;
public $marca;

    public function dirigir(){
    
    return "você esta dirigindo o carro da cor".$this-> cor;
}
     public function aselerar (){
    
    return "o carro que você esta aselerando e da marca ".$this-> marca; 
}
     public function estacionar(){
    
    return "o volante do carro que você esta dirigindo e muito duro porque ele   ".$this-> idade; 
}


}

$c1 = new  carro ();
$c1->cor = "  prata";
echo  $c1-> dirigir(). "<br>";


$c3 = new carro ();
$c3->marca = "BMW";
echo $c3-> aselerar(). "<br>";

$c2 = new carro ();
$c2->idade = "tem 20 anos";
echo  $c2-> estacionar(). "<br>";


?>

<?php
class vidiogame
{

public $jogar;
public $cor;
public $potencia;
public $idade;
public $marca;

    public function jogar(){
    
    return "você esta jogando no videogame da cor".$this-> cor;
}
     public function ligar (){
    
    return "você ligou o videogame da ".$this-> marca; 
}
     public function arrumar(){
    
    return "você esta arrumando o videogame velho   ".$this-> idade; 
}


}

$v1 = new  carro ();
$v1->cor = "  branca";
echo  $v1-> jogar(). "<br>";


$v3 = new carro ();
$v3->marca = "nintendo";
echo $v3-> ligar(). "<br>";

$v2 = new carro ();
$v2->idade = "de 10 anos ";
echo  $v2-> arrumar(). "<br>";


?>