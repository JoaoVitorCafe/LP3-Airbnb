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
        
        // for($i = 0; i < count($usuarios) ; $i++) {
        //     if($usuarios[$i]->getEmail() == $_POST['email'] AND usuarios[$i]->getSenha() == $_POST['senha'] ){
        //         $_SESSION["email"] = $usuarios[$i]->getEmail();
        //         $_SESSION["nome"] = $usuarios[$i]->getnome();
        //         return header('Location:PERFIL', true ,302);
        //     }
        // }
    
    }
}
    
?>