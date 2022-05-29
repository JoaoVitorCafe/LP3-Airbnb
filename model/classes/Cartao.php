<?php

    class Cartao
    {
        private $titular;
        private $cpf_titular;
        private $numero;
        private $codigo_seguranca;
        private $data_validade;

        function __construct($titular , $cpf_titular , $numero , $codigo_seguranca , $data_validade) {
            $this->titular = $titular;
            $this->cpf_titular = $cpf_titular;
            $this->numero = $numero;
            $this->codigo_seguranca = $codigo_seguranca;
            $this->data_validade = $data_validade;
        }


        public function setTitular($titular)
        {
            $this->titular = $titular;
        }
       
        public function getTitular()
        {
            return $this->titular;
        } 

        public function setCpf_titular($cpf_titular)
        {
            $this->cpf_titular = $cpf_titular;
        }
        public function getCpf_titular()
        {
           return $this->cpf_titular;
        } 

        public function setNumero($numero)
        {
            $this->numero = $numero;
        }

        public function getNumero()
        {
            return $this->numero;
        } 


        public function setCodigo_seguranca($codigo_seguranca)
        {
            $this->codigo_seguranca = $codigo_seguranca;
        }
        
        public function getCodigo_seguranca()
        {
            return $this->codigo_seguranca;
        } 

        public function setData_validade($data_validade)
        {
            $this->data_validade = $data_validade;
        }

        public function getData_validade()
        {
           return $this->data_validade;
        } 

    }
?>    