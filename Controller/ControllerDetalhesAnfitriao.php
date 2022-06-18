<?php
session_start();
require_once "Model/Imovel.php";
class ControllerDetalhesAnfitriao{
    
    public function processaRequisicao(){
        
        require "View/detalhes_anfitriao.php";
    }
}
    
    
?>