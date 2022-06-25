<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
require_once "Model/Anuncio.php";
require_once "Model/Aluguel.php";
class ControllerPerfil{
    
    public function processaRequisicao(){
        // pegar os imoveis e colocar o anuncio
        $imoveisCadastrados = Imovel::buscarImoveisCadastrados(intval($_SESSION['id']));
        for($i =0 ; $i < count($imoveisCadastrados) ; $i++) {
            if(Anuncio::find($imoveisCadastrados[$i]->getIdImovel())){
                $imoveisCadastrados[$i]->setAnuncio(true);
            }
        }

        //pegar os imoveis alugados;
        $alugueis = Aluguel::getAlugueisLocatario(intval($_SESSION['id']));
        require "View/perfil.php";
    }
}
    
?>