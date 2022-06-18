<?php
require "Model/Usuario.php";
// Listar as acomodações no home para isso pegar as acomodações no home
class ControllerHome{
    
    public function processaRequisicao(){
        require "View/home.php";
    }
}
    
    
?>