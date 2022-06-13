<?php
require "Model/Usuario.php";
class ControladorNovoUser{
   private $usuario;
   
   public function processaRequisicao(){
      //receber os dados do formulario e setar o objeto
      $this->usuario = new Usuario($_POST['nome'] ,$_POST['senha'] , $_POST['email'] , $_POST['']);  
      $this->livro->incluirLivro();
 
      header('Location:Perfil.php', true,302);
   }
}
   
   
?>