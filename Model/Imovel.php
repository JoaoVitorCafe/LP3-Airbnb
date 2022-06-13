<?php
    class Imovel 
    {
        private $endereco;
        private $capacidade;
        private $complemento;
        private $descricao;
        private $tipo;
        private $preco_diaria;
        private $caracteristicas = array();
        private $cartao_recebimento;
        private $anfitriao;
        private $anuncio;
        private $comentarios = array();
        private $alugueis = array() ;
        private $periodos = array() ;

        function __construct($endereco , $capacidade , $complemento , $descricao , $tipo , $preco_diaria , $cartao_recebimento , $anfitriao , $anuncio) {
            $this->endereco = $ependereco;
            $this->capacidade = $capacidade;
            $this->complemento = $complemento;
            $this->descricao = $descricao;
            $this->tipo = $tipo;
            $this->preco_diaria = $preco_diaria;
            $this->cartao_recebimento = $cartao_recebimento;
            $this->anfitriao = $anfitriao;
            $this->anuncio = null;
        }

        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;
        }

        public function getEndereco()
        {
           return $this->endereco;
        }

        public function setCapacidade($capacidade)
        {
            $this->capacidade = $capacidade;
        }

        public function getCapacidade()
        {
           return $this->capacidade;
        }

        public function setComplemento($complemento)
        {
            $this->complemento= $complemento;
        }

        public function getComplemento()
        {
           return $this->complemento;
        }

        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        public function getDescricao()
        {
           return $this->descricao;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

        public function getTipo()
        {
           return $this->tipo;
        }   


        public function setPreco_diaria($preco_diaria)
        {
            $this->preco_diaria = $preco_diaria;
        }

        public function getPreco_diaria()
        {
           return $this->preco_diaria;
        }

        public function setCaracteristicas($caracteristica)
        {
            $this->caracteristicas_push($caracteristica);
        }

        public function getCaracteristicas()
        {
           return $this->caracteristicas;
        }

        public function setCartao_recebimento($cartao_recebimento)
        {
            $this->cartao_recebimento = $cartao_recebimento;
        }

        public function getCartao_recebimento()
        {
            return $this->cartao_recebimento;
        }

        public function setAnfitriao($anfitriao)
        {
            $this->anfitriao = $anfitriao;
        }

        public function getAnfitriao()
        {
           return $this->anfitriao;
        }


        public function setAnuncio($anuncio)
        {
            $this->anuncio = $anuncio;
        }

        public function getAnuncio()
        {
            return $this->anuncio;
        }

        public function setComentarios($comentario)
        {
            $this->comentarios_push($comentario);
        }

        public function getComentarios()
        {
           return $this->comentarios;
        }

        public function setAluguel($aluguel)
        {
            $this->alugueis_push($aluguel);
        }

        public function getAluguel()
        {
           return $this->alugueis;
        }


        /**
         * Get the value of periodos
         */ 
        public function getPeriodos()
        {
                return $this->periodos;
        }

        /**
         * Set the value of periodos
         *
         * @return  self
         */ 
        public function setPeriodos($periodo)
        {
                $this->periodos_push($periodo);

                return $this;
        }
    }
?>