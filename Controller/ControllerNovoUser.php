<?php
require "Model/Usuario.php";
class ControladorNovoUser{
   private $usuario;
   
   public function processaRequisicao(){
      // Receber os dados e criar usuário.
      $this->usuario = new Usuario($_POST['nome'] , $_POST['email'],
      $_POST['senha'] , $_POST['telefone'] , $_POST['cidade'] , $_POST['estado'] ,$_POST['pais']);  
      //this->usuario->add();
      header('Location:PERFIL', true ,302);
   }
}
   
   
?>