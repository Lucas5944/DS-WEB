<?php
class Artista {
    public $nome;
    public $genero;

    public function __construct($novoNome, $novoGenero) {
        $this->nome = $novoNome;   
        $this->genero = $novoGenero; 
    }

    public function exibirDados() {
         return "Nome do artista: " . $this->nome . " | Gênero musical: " . $this->genero;
    }   
}

class Musica {
    public $titulo;
    public $dura;

    public function __construct($novoTitulo, $novaDura) {
        $this->titulo = $novoTitulo;
        $this->dura = $novaDura;
    }

    public function exibirDados() {
         return "Nome da música: " . $this->titulo . " | Tempo de música: " . $this->dura;
    }   
}

$artista = new Artista("Ozzy Osbourne", "Heavy Metal");
echo $artista->exibirDados();

echo '<br>';

$musica = new Musica("Crazy Train", "4:56");
echo $musica->exibirDados();
?>