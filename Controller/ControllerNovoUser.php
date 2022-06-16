<?php
session_start();
require "Model/Usuario.php";
class ControladorNovoUser{
   private $usuario;
   
   public function processaRequisicao(){
      $this->usuario = new Usuario($_POST['nome'] , $_POST['email'],
      $_POST['senha'] , $_POST['telefone'] , $_POST['cidade'] , $_POST['estado'] ,$_POST['pais']);  
      //this->usuario->add();
      $_SESSION["email"] = $this.usuario[$i]->getEmail();
      $_SESSION["nome"] = $this.usuario[$i]->getnome();
      header('Location: HOME', true ,302);
   }
}
   
   
?>