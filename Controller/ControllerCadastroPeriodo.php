<?php
require_once "Model/Periodo.php";

class ControllerCadastroPeriodo
{
   private $periodo;

   public function processaRequisicao()
   {

      $this->periodo = new Periodo($_POST['idImovel'], $_POST['inicio_locacao'], $_POST['fim_locacao']);


      $this->periodo->cadastrar($this->periodo);

      header('Location: DETALHES', true, 302);
   }
}
