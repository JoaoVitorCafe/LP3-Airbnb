<?php

    class Endereco
    {
        private $cep;
        private $rua;
        private $cidade;
        private $estado;
        private $pais;
        private $numero;
        private $complemento;

        function __construct($cep , $rua , $cidade , $estado , $pais , $numero , $complemento) {
            $this->cep = $cep;
            $this->rua = $rua;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->pais = $pais;
            $this->numero = $numero;
            $this->complemento = $complemento;
          }

        public function setCep($cep)
        {
            $this->cep = $cep;
        } 
        
        public function getCep()
        {
           return $this->cep;
        } 

        public function setRua($rua)
        {
            $this->rua = $rua;
        } 

        public function getRua()
        {
            return $this->rua;
        }

        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        } 

        public function getCidade()
        {
            return $this->cidade;
        } 

        public function setEstado($estado)
        {
            $this->estado= $estado;
        } 

        public function getEstado()
        {
            return $this->estado;
        } 

        public function setPais($pais)
        {
            $this->pais= $pais;
        } 

        public function getPais()
        {
            return $this->pais;
        } 

        public function setNumero($numero)
        {
            $this->numero = $numero;
        } 

        public function getNumero()
        {
            return $this->numero;
        } 
        
        public function setComplemento($complemento)
        {
            $this->complemento = $complemento;
        } 

        public function getComplemento()
        {
           return $this->complemento;
        } 
    }
?>    