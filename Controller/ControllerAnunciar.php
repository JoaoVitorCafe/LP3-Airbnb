<?php
session_start();
require "Model/Cartao.php";
require "Model/Anuncio.php";
require "Model/Imovel.php";

class ControllerAnunciar
{
    private $cartao;
    private $anuncio;
    private $imovel;

    public function processaRequisicao()
    {
        $idCartao = Cartao::find($_POST['numero_cartao']);
        if (!$idCartao) {
            $this->cartao = new Cartao(
                $_SESSION["id"],
                $_POST['titular'],
                $_POST['cpf'],
                $_POST['numero_cartao'],
                $_POST['codigo_seguranca'],
                $_POST['validade_cartao']
            );
            $idCartao = $this->cartao->cadastrar($this->cartao);
        }
    
            // busca o imóvel
            // cria anuncio passando os parametros e faz os calculos de tempo.
            
            if(!Anuncio::find($_POST["idImovel"])) {
                $info = explode("|", $_POST["anuncio"]);
                $preco = floatval($info[0]);
                $tipo = $info[1];
                $dataTermino = (date('Y-m-d', strtotime($tipo)));
                $this->anuncio = new Anuncio($_POST["idImovel"], $idCartao, $preco, $tipo, $dataTermino);
                $this->anuncio->cadastrar($this->anuncio);
            }
         
            header('Location:DETALHESANFITRIAO', true, 302);
    }
}
