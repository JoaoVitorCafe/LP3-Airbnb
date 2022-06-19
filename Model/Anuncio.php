<?php

    class Anuncio 
    {
        private $idAnuncio;
        private $idImovel;
        private $preco;
        private $tipo;
        private $dataTermino;

        function __construct($idAnuncio , $idImovel , $preco , $tipo , $dataTermino) {
            $this->idAnuncio = $idAnuncio;
            $this->idImovel = $idImovel;
            $this->preco = $preco;
            $this->tipo = $tipo;
            $this->$dataTermino = $dataTermino;

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

        public function getDataTermino()
        {
                return $this->dataTermino;
        }

        public function setDataTermino($dataTermino)
        {
                $this->dataTermino = $dataTermino;

                return $this;
        }

        /**
         * Get the value of idAnuncio
         */ 
        public function getIdAnuncio()
        {
                return $this->idAnuncio;
        }

        /**
         * Set the value of idAnuncio
         *
         * @return  self
         */ 
        public function setIdAnuncio($idAnuncio)
        {
                $this->idAnuncio = $idAnuncio;

                return $this;
        }

        /**
         * Get the value of idImovel
         */ 
        public function getIdImovel()
        {
                return $this->idImovel;
        }

        /**
         * Set the value of idImovel
         *
         * @return  self
         */ 
        public function setIdImovel($idImovel)
        {
                $this->idImovel = $idImovel;

                return $this;
        }
    }
?>    