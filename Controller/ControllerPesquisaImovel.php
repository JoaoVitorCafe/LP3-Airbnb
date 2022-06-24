<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
class ControllerPesquisaImovel{
    
    public function processaRequisicao(){
        // pegar os posts e fazer as pesquisas
        $imoveis = Imovel::filtrar($_POST);
        require "View/home.php";
    }
}
    
?>