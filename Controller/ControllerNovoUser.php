<?php
session_start();
require "Model/Usuario.php";

class ControllerNovoUser{
   private $usuario;
   
   public function processaRequisicao(){
      $this->usuario = new Usuario($_POST['nome'] , $_POST['email'],
      $_POST['senha'] , $_POST['telefone'] , $_POST['cidade'] , $_POST['estado'] ,$_POST['pais']);  
      
      if($this->usuario->cadastrar($this->usuario)) {
         $_SESSION["id"] = $this->usuario->getId();
         $_SESSION["nome"] = $this->usuario->getNome();
         header('Location: PERFIL', true ,302);
      } else {
         header('Location: CADASTRARUSUARIO', true , 302);
      }
   }
}
   
   
?>