<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
require_once "Model/Anuncio.php";
class ControllerHome{
    
    // dar um jeito de chamar os imoveis "premium" aqui;
    public function processaRequisicao(){
        $imoveis = array();
        if(isset($_SESSION["id"])) {
            $imoveisAnunciados = Anuncio::getAnunciados(idSession: $_SESSION["id"]);
            $imoveisPadrao = Imovel::getAll(idSession: $_SESSION["id"]);
        } else {
            $imoveisAnunciados = Anuncio::getAnunciados();
            $imoveisPadrao = Imovel::getAll();
        }
        
        $imoveisDuplicados = array_merge($imoveisAnunciados , $imoveisPadrao);
        $idimoveis = array();
        
        // remove os imoveis duplicados
        for($i= 0 ; $i < count($imoveisDuplicados); $i++){
            if(!in_array($imoveisDuplicados[$i]->getIdImovel() , $idimoveis)){
                array_push($idimoveis , $imoveisDuplicados[$i]->getIdImovel());
                array_push($imoveis , $imoveisDuplicados[$i]);
            }
        }
        
        require "View/home.php";
    }
}
    
    
?>