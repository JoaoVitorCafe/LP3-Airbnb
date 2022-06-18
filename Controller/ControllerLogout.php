<?php
session_start();
require "Model/Usuario.php";
class ControllerLogout{
    
    public function processaRequisicao(){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        
        header('Location: HOME', true , 302);
        
    }
}
    
?>