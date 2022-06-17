<?php
session_start();
require "Model/Usuario.php";
class ControllerPaginaLogin{
    
    public function processaRequisicao(){   
        require 'View/login.php';
    }
}
    
?>