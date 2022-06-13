<?php

    Class Aluguel
    {
        private $locatario;
        private $imovel;
        private $periodo_inicio;
        private $periodo_fim;
        private $checked;
        private $cancelado;

      function __construct($locatario , $imovel , $periodo_inicio , $periodo_fim , $checked) {
         $this->locatario = $locatario;
         $this->imovel = $imovel;
         $this->periodo_inicio = $periodo_inicio;
         $this->periodo_fim = $periodo_fim;
         $this->checked = false;
         $this->cancelado = false;
       }

      public function setLocatario($locatario)
     {
        $this->locatario = $locatario;
     }

      public function getLocatario()
     {
        return $this->locatario;
     }

      public function setImovel($imovel)
     {
        $this->imovel= $imovel;
     }


      public function getImovel()
     {
        return $this->imovel;
     }

     public function setPeriodo_inicio($periodo_inicio)
     {
         $this->periodo_inicio = $periodo_inicio;
     }


     public function getPeriodo_inicio()
     {
      return $this->periodo_inicio;
     }

     public function setPeriodo_fim($periodo_fim)
     {
      $this->periodo_fim = $periodo_fim;
     }


     public function getPeriodo_fim()
     {
      return $this->periodo_fim;
     }

     public function setChecked ($checked)
     {
      $this->checked = $checked;
     }


     public function getChecked()
     {
      return $this->checked;
     }

        /**
         * Get the value of cancelado
         */ 
        public function getCancelado()
        {
                return $this->cancelado;
        }

        /**
         * Set the value of cancelado
         *
         * @return  self
         */ 
        public function setCancelado($cancelado)
        {
                $this->cancelado = $cancelado;

                return $this;
        }
    }