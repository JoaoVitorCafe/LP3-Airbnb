<?php
session_start();
require_once "Model/Imovel.php";
require_once "Model/Usuario.php";
require_once "Model/Endereco.php";
require_once "Model/Periodo.php";
require_once "Model/Comentario.php";
require_once "Model/Anuncio.php";
require_once "Model/Aluguel.php";
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
        
        // $periodoAlugado = false;
        $idLocatario = false;
        $checked = 0;
        $cancelado = 0;
        if(isset($_POST['idAluguel'])) {
            $_SESSION["idAluguel"] = $_POST['idAluguel'];
            $aluguel = Aluguel::getAlugueisImovel($_POST["idAluguel"]);
            $idLocatario = $aluguel->getLocatario();
            $checked = $aluguel->getChecked();
            $cancelado = $aluguel->getCancelado();
        }

        // tratamento de data;
        $dataTermino = false;
        if($anuncio = Anuncio::find($_SESSION["idImovel"])){
            $dataTermino = new DateTime($anuncio->getDataTermino());
            $dataTermino = $dataTermino->format('d-m-Y');
        };
        //apenas mostrar o anucio na página se o usuário for o anfitrião
        // $comentarios = Comentarios::find();
        
        require "View/detalhes_anfitriao.php";
    }
}
    
    
?>