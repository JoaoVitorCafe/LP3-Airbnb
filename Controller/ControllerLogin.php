<?php
session_start();
require "Model/.php";
class ControllerLogin{
    
    public function processaRequisicao(){
        $usuarios = Usuario->getAll();
        for($i = 0; i < count($usuarios) ; $i++) {
            if($usuarios[$i]->getEmail() == $_POST['email'] && usuarios[$i]->getSenha() == $_POST['senha']){
                $_SESSION["email"] = $usuarios[$i]->getEmail();
                $_SESSION["nome"] = $usuarios[$i]->getnome();
                return header('Location:PERFIL', true ,302);
            }
        }
        
        require 'View/login.php';
    }
}
    
?>