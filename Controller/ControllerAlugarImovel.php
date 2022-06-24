<?php
session_start();
require "Model/Cartao.php";
require "Model/Imovel.php";
require "Model/Aluguel.php";

class ControllerAlugarImovel{
    private $cartao;
    private $aluguel;
    private $imovel;
   
   public function processaRequisicao(){ 
    $idCartao = Cartao::find($_POST['numero_cartao']);
        if (!$idCartao) {
            $this->cartao = new Cartao(
                $_SESSION["id"],
                $_POST['titular'],
                $_POST['cpf'],
                $_POST['numero_cartao'],
                $_POST['codigo_seguranca'],
                $_POST['validade_cartao']
            );
            $idCartao = $this->cartao->cadastrar($this->cartao);
        }
    // criar um aluguel com o id do imóvel e do cartão;
    // cadastrar aluguel e adicionar aos imoveis cadastrados para mandar pro perfil
    

    header('Location:PERFIL', true ,302);
    }
}
   
   
?>