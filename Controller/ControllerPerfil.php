<?php
require "Model/Usuario.php";

class ControllerPerfil{
    
    public function processaRequisicao(){
        // pegar os dados do usuário , imóveis cadastrados e imóveis alugados
        require "View/perfil.php";
    }
}
    
?>