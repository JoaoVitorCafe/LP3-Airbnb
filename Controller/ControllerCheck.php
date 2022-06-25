<?php
require_once "Model/Aluguel.php";
class ControllerCheck{
    
    public function processaRequisicao(){
        if(intval($_POST["check"])){
            $idAluguel = $_POST["idAluguel"];
            Aluguel::check($idAluguel);
        }
        
        header('Location:PERFIL', true , 302);
    
    }
}
    
?>