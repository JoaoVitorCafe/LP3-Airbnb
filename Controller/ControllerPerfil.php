<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
class ControllerPerfil{
    
    public function processaRequisicao(){
        //pega todos os imóveis que tem o id igual ao sessionID;
        // futuramente pegar os imoveis alugados;
        $imoveis = Imovel::buscarImoveisCadastrados(intval($_SESSION['id']));

        require "View/perfil.php";
    }
}
    
?>