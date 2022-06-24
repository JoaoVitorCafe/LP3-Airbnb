<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
class ControllerHome{
    
    public function processaRequisicao(){
        if(isset($_SESSION["id"])) {
            $imoveis = Imovel::getAll(idSession: $_SESSION["id"]);
        } else {
            $imoveis = Imovel::getAll();
        }
        require "View/home.php";
    }
}
    
    
?>