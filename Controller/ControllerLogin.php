<?php
session_start();
require "Model/Usuario.php";
class ControllerLogin{
    
    public function processaRequisicao(){
        $login = Usuario::pesquisaUsuario($_POST['email'] , $_POST['senha']);
        
        if($login[0] != NULL){
            $_SESSION["email"] = $login[0];
            $_SESSION["nome"] =  $login[1];
            header('Location:PERFIL', true , 302);
        } else {
            header('Location:PAGINALOGIN', true , 302);
        }   
    }
}
    
?>