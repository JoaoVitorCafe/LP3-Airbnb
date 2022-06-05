<?php

    class Anuncio 
    {
        private $inicio;
        private $fim;


        function __construct($inicio , $fim) {
            $this->inicio = $inicio;
            $this->fim = $fim;
        }

        /**
         * Get the value of inicio
         */ 
        public function getInicio()
        {
                return $this->inicio;
        }

        /**
         * Set the value of inicio
         *
         * @return  self
         */ 
        public function setInicio($inicio)
        {
                $this->inicio = $inicio;

                return $this;
        }

        /**
         * Get the value of fim
         */ 
        public function getFim()
        {
                return $this->fim;
        }

        /**
         * Set the value of fim
         *
         * @return  self
         */ 
        public function setFim($fim)
        {
                $this->fim = $fim;

                return $this;
        }
    }
?>    