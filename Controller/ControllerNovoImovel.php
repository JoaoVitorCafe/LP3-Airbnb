<?php
session_start();
require "Model/Cartao.php";
require "Model/Endereco.php";
require "Model/Imovel.php";

class ControllerNovoImovel{
    private $cartao;
    private $endereco;
    private $imovel;
   
   public function processaRequisicao(){ 
    $this->cartao = new Cartao($_SESSION["id"] , $_POST['titular'] , $_POST['cpf'],
    $_POST['numero_cartao'] , $_POST['codigo_seguranca'] , $_POST['validade_cartao']);
      
    $idCartao = $this->cartao->cadastrar($this->cartao);    

    $this->endereco = new Endereco($_POST['cep'] , $_POST['rua'],
    $_POST['cidade'] , $_POST['estado'] , $_POST['pais'] , $_POST['numero'] , $_POST['complemento']);  
      
    $idEndereco = $this->endereco->cadastrar($this->endereco);
   
    $this->imovel = new Imovel($_SESSION["id"] , $idCartao , $idEndereco ,
    $_POST['capacidade_pessoas'] , $_POST['descricao'] , intval($_POST['tipo_imovel']) , $_POST['preco_locacao']);  
    
    foreach ($_POST['caracteristicas_imovel'] as $caracteristica)
        $this->imovel->setCaracteristicas(intval($caracteristica));
        
    $this->imovel->cadastrar($this->imovel);  

    header('Location:PERFIL', true ,302);
    }
}
   
   
?>