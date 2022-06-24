<?php
session_start();
require_once "Model/Usuario.php";
require_once "Model/Imovel.php";
require_once "Model/Anuncio.php";
class ControllerPerfil{
    
    public function processaRequisicao(){
        $imoveis = Imovel::buscarImoveisCadastrados(intval($_SESSION['id']));
        for($i =0 ; $i < count($imoveis) ; $i++) {
            if(Anuncio::find($imoveis[$i]->getIdImovel())){
                $imoveis[$i]->setAnuncio(true);
            }
        }
        //pegar os imoveis alugados;
        require "View/perfil.php";
    }
}
    
?>