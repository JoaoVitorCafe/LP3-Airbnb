<?php
session_start();
require_once "Model/Imovel.php";
require_once "Model/Usuario.php";
require_once "Model/Endereco.php";
require_once "Model/Periodo.php";
require_once "Model/Comentario.php";
require_once "Model/Anuncio.php";
require_once "Model/Aluguel.php";
class ControllerDetalhes
{

    public function processaRequisicao()
    {

        // Guarda o imóvel para quando o usuário cadastrar periodos ele voltar pra mesma página de detalhes com os dados do imóvel
        if (isset($_POST['idImovel'])) {
            $_SESSION["idImovel"] = $_POST['idImovel'];
        }

        $imovel = Imovel::find(intval($_SESSION["idImovel"]));
        $anfitriao = Usuario::find(intval($imovel->getAnfitriao()));
        $endereco = Endereco::find(intval($imovel->getEndereco()));
        $tipo = Imovel::findTipo(intval($imovel->getTipo()));
        $caracteristicas = Imovel::findCaracteristicas(intval($imovel->getIdImovel()));
        $periodosImovel = Periodo::find($_SESSION["idImovel"]);
        $periodos = array();
        foreach ($periodosImovel as $periodo) {
            if (!$periodo->getEmUso()) {
                array_push($periodos, $periodo);
            }
        }

        $idLocatario = 0;
        $checked = 0;
        $cancelado = 0;
        $idAluguel = 0;
        $periodoAluguel = 0;
        if (isset($_POST['idAluguel'])) {
            $_SESSION["idAluguel"] = $_POST['idAluguel'];
            $aluguel = Aluguel::getAlugueisImovel($_SESSION["idAluguel"]);
            $idLocatario = $aluguel->getLocatario();
            $checked = $aluguel->getChecked();
            $cancelado = $aluguel->getCancelado();
            $idAluguel = $aluguel->getIdAluguel();
            $periodoAluguel = $aluguel->getPeriodo()->format();
        }

        // tratamento de data;
        $dataTermino = false;
        $anunciado = false;
        if ($anuncio = Anuncio::find($_SESSION["idImovel"])) {
            $anunciado = true;
            $dataTermino = new DateTime($anuncio->getDataTermino());
            $dataTermino = $dataTermino->format('d-m-Y');
        };
        //apenas mostrar o anucio na página se o usuário for o anfitrião
        // $comentarios = Comentarios::find();

        require "View/detalhes.php";
    }
}
