<?php
session_start();
require "Model/Usuario.php";
class ControllerCadastroUser{
    
    public function processaRequisicao(){
        if(isset($_POST["idImovel"])){
            $_SESSION["idImovel"] = $_POST["idImovel"];
        }
        require "View/cadastro.php";
    }
}
    
?>