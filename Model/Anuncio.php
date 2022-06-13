<?php

    class Anuncio 
    {
        private $preco;
        private $tipo;


        function __construct($preco , $tipo) {
            $this->preco = $preco;
            $this->tipo = $tipo;
        }

        public function setPreco($preco)
        {
            $this->preco = $preco;
        }
        
        public function getPreco()
        {
            return $this->preco;
        } 
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

        public function getTipo()
        {
            return $this->tipo;
        } 
    }
?>    