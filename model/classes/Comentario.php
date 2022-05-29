<?php

    class Comentario
    {
        private $usuario;
        private $texto;
        private $data_postagem;

        function __construct($usuario , $texto , $data_postagem) {
            $this->usuario = $usuario;
            $this->texto = $texto;
            $this->data_postagem = $data_postagem;
        }

        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;
        } 

        public function getUsuario()
        {
            return $this->usuario;
        }
        
        public function setTexto($texto)
        {
            $this->texto = $texto;
        } 
        
        public function getTexto()
        {
            return $this->texto;
        } 


        public function setData_postagem($data_postagem)
        {
            $this->data_postagem = $data_postagem;
        } 

        public function getData_postagem()
        {
            return $this->data_postagem;
        } 
    }
?>    