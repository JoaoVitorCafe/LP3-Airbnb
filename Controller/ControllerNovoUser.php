<?php
session_start();
require "Model/Usuario.php";

class ControllerNovoUser{
   private $usuario;
   
   public function processaRequisicao(){
      $this->usuario = new Usuario($_POST['nome'] , $_POST['email'],
      $_POST['senha'] , $_POST['telefone'] ,$_POST['pais']);  
      
      if(isset($_FILES['imagem'])) {
         $this->usuario->setImagem($_FILES['imagem']);
      }

      if($this->usuario->cadastrar($this->usuario)) {
         $_SESSION["id"] = $this->usuario->getId();
         $_SESSION["nome"] = $this->usuario->getNome();
         $_SESSION["imagem"] = $this->usuario->getImagem();
         header('Location: PERFIL', true ,302);
      } else {
         header('Location: CADASTRARUSUARIO', true , 302);
      }
   }
}
   
   
?>