<?php
require_once "Conexao.php";

    class Cartao
    {
        private $idCartao;
        private $idUsuario;
        private $titular;
        private $cpf_titular;
        private $numero;
        private $codigo_seguranca;
        private $data_validade;

        function __construct($idUsuario , $titular , $cpf_titular , $numero , $codigo_seguranca , $data_validade) {
            $this->idUsuario = $idUsuario;
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


        /**
         * Get the value of idCartao
         */ 
        public function getIdCartao()
        {
                return $this->idCartao;
        }

        /**
         * Set the value of idCartao
         *
         * @return  self
         */ 
        public function setIdCartao($idCartao)
        {
                $this->idCartao = $idCartao;

                return $this;
        }

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        public function cadastrar($cartao) {
            try{  
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_airbnb.cartoes (titular, usuarios_idusuarios , numero ,codigo_seguranca ,data_validade , cpf) values (:titular, :usuarios_idusuarios , :numero, :codigo_seguranca, :data_validade, :cpf)");
                $sql->bindParam("titular",$titular);
                $sql->bindParam("usuarios_idusuarios",$idUsuario);
                $sql->bindParam("numero",$numero);
                $sql->bindParam("codigo_seguranca",$codigo_seguranca);
                $sql->bindParam("data_validade",$data_validade);
                $sql->bindParam("cpf",$cpf);
                
                $titular = $cartao->getTitular();
                $idUsuario = intval($cartao->getIdUsuario());
                $numero = $cartao->getNumero();
                $codigo_seguranca = $cartao->getCodigo_seguranca();
                $data_validade = $cartao->getData_validade();
                $cpf = $cartao->getCpf_titular();
                
                $sql->execute();
                $last_id = $minhaConexao->lastInsertId();
                $cartao->setIdCartao($last_id);
                return $last_id;
             }
             catch(PDOException $e){ 
                echo "entrou no catch".$e->getmessage();
                return 0;
             }
        }
    }
?>    