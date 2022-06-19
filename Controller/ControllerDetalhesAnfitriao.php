<?php
session_start();
require_once "Model/Imovel.php";
require_once "Model/Usuario.php";
require_once "Model/Endereco.php";
require_once "Model/Periodo.php";
require_once "Model/Comentario.php";
class ControllerDetalhesAnfitriao{
    
    public function processaRequisicao(){
        $imovel = Imovel::find(intval($_POST['idImovel']));
        $anfitriao = Usuario::find(intval($imovel->getAnfitriao()));
        $endereco = Endereco::find(intval($imovel->getEndereco()));
        $tipo = Imovel::findTipo(intval($imovel->getTipo()));
        $caracteristicas = Imovel::findCaracteristicas(intval($imovel->getIdImovel()));
        
        // $periodo = Periodo::find();
        // $comentarios = Comentarios::find();
        
        require "View/detalhes_anfitriao.php";
    }
}
    
    
?>