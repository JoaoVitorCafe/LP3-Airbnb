<?php
require_once "Model/Aluguel.php";
class ControllerCancelarLocacao
{

    public function processaRequisicao()
    {
        if (intval($_POST["cancelar"])) {
            $idAluguel = $_POST["idAluguel"];
            Aluguel::cancelar($idAluguel);
        }
        header('Location:PERFIL', true, 302);
    }
}
