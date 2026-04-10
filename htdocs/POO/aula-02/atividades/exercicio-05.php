<?php

class Documento {
    protected $numero;

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
}

class CPF extends Documento {

    public function validar() {
        $cpf = $this->getNumero();

        if ($cpf == null) return false;

        
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        
        if (strlen($cpf) != 11) return false;

        
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        try {
            
            $soma = 0;
            for ($i = 0; $i < 9; $i++) {
                $soma += $cpf[$i] * (10 - $i);
            }

            $primeiroDigito = 11 - ($soma % 11);
            if ($primeiroDigito >= 10) $primeiroDigito = 0;

           
            $soma = 0;
            for ($i = 0; $i < 10; $i++) {
                $soma += $cpf[$i] * (11 - $i);
            }

            $segundoDigito = 11 - ($soma % 11);
            if ($segundoDigito >= 10) $segundoDigito = 0;

            return (
                $primeiroDigito == $cpf[9] &&
                $segundoDigito == $cpf[10]
            );

        } catch (Exception $e) {
            return false;
        }
    }
}


$cpf = new CPF();
$cpf->setNumero("529.982.247-25");

echo "CPF: " . $cpf->getNumero() . "<br>";
echo "É válido? " . ($cpf->validar() ? "Sim" : "Não");

?>