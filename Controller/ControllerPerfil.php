<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
class ControllerPerfil{
    
    public function processaRequisicao(){
        // futuramente pegar os imoveis alugados;
        // pegar o nome dos tipos também;
        //pega todos os imóveis que tem o id igual ao sessionID;
        $imoveis = Imovel::buscarImoveisCadastrados(intval($_SESSION['id']));
        $tipos = array();
        foreach ($imoveis as $imovel) {
            array_push($tipos , Imovel::findTipo(intval($imovel->getTipo())));
          }
        require "View/perfil.php";
    }
}
    
?>