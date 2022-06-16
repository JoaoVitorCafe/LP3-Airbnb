<?php
session_start();
require "Model/.php";
class ControllerLogin{
    
    public function processaRequisicao(){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        
        header('Location: HOME', true , 302);
        
    }
}
    
?>