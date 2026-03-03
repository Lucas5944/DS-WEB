<?php


abstract class Produto {

    protected $nome;
    protected $preco;
    protected $estoque;

    

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function getEstoque() {
        return $this->estoque;
    }    
    abstract public function calcularDesconto();

    
    protected function aplicarDescontoExtra($precoFinal) {
        if ($this->estoque < 5) {
            $precoFinal *= 0.90; 
        }
        return $precoFinal;
    }
}
class Eletronico extends Produto {

    public function calcularDesconto() {
        $precoFinal = $this->preco * 0.90; 
        return $this->aplicarDescontoExtra($precoFinal);
    }
}
class Roupa extends Produto {

    public function calcularDesconto() {
        $precoFinal = $this->preco * 0.80; 
        return $this->aplicarDescontoExtra($precoFinal);
    }
}



$notebook = new Eletronico();
$notebook->setNome("Notebook");
$notebook->setPreco(3000);
$notebook->setEstoque(3); 

$camiseta = new Roupa();
$camiseta->setNome("Camiseta");
$camiseta->setPreco(100);
$camiseta->setEstoque(10); 


echo " ELETRÔNICO <br>";
echo "Produto: " . $notebook->getNome() . "<br>";
echo "Preço original: R$ " . $notebook->getPreco() . "<br>";
echo "Preço com desconto: R$ " . $notebook->calcularDesconto() . "<br><br>";

echo " ROUPA <br>";
echo "Produto: " . $camiseta->getNome() . "<br>";
echo "Preço original: R$ " . $camiseta->getPreco() . "<br>";
echo "Preço com desconto: R$ " . $camiseta->calcularDesconto() . "<br>";

?>