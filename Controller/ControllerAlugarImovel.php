<?php
session_start();
require "Model/Cartao.php";
require "Model/Imovel.php";
require "Model/Aluguel.php";

class ControllerAlugarImovel
{
    private $cartao;
    private $aluguel;
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

        $this->aluguel = new Aluguel($_POST["idImovel"], $_POST["periodo"], $_SESSION["id"], $idCartao);
        $idAluguel = $this->aluguel->cadastrar($this->aluguel);

        header('Location: DETALHESANFITRIAO', true ,302);
    }
}
