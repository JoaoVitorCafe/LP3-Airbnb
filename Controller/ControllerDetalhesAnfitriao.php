<?php
session_start();
require_once "Model/Imovel.php";
require_once "Model/Usuario.php";
require_once "Model/Endereco.php";
require_once "Model/Periodo.php";
require_once "Model/Comentario.php";
class ControllerDetalhesAnfitriao{
    
    public function processaRequisicao(){

        // Guarda o imóvel para quando o usuário cadastrar periodos ele voltar pra mesma página de detalhes com os dados do imóvel
        if(isset($_POST['idImovel'])) {
            $_SESSION["idImovel"] = $_POST['idImovel'];
        }
        
        $imovel = Imovel::find(intval($_SESSION["idImovel"]));
        $anfitriao = Usuario::find(intval($imovel->getAnfitriao()));
        $endereco = Endereco::find(intval($imovel->getEndereco()));
        $tipo = Imovel::findTipo(intval($imovel->getTipo()));
        $caracteristicas = Imovel::findCaracteristicas(intval($imovel->getIdImovel()));
        $periodos = Periodo::find($_SESSION["idImovel"]);
        // $anuncios = Anuncio::find(ssessionidmovel);
        //apenas mostrar o anucio na página se o usuário for o anfitrião
        // $comentarios = Comentarios::find();
        
        require "View/detalhes_anfitriao.php";
    }
}
    
    
?>