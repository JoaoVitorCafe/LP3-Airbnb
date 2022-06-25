<?php
require_once "Model/Aluguel.php";
require_once "Model/Periodo.php";
class ControllerCancelarLocacao
{

    public function processaRequisicao()
    {
        if (intval($_POST["cancelar"])) {
            $idAluguel = $_POST["idAluguel"];
            Aluguel::cancelar($idAluguel);
            $aluguel = Aluguel::find($idAluguel);
            Periodo::setUso($aluguel->getPeriodo() , 0);
        }
        header('Location:PERFIL', true, 302);
    }
}
