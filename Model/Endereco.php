<?php
require_once "Conexao.php";
    class Endereco
    {
        private $idEndereco;
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

        public function cadastrar($endereco) {
            try{  
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_airbnb.enderecos (cep , rua, cidade ,estado ,pais , numero , complemento) values ( :cep, :rua , :cidade, :estado, :pais, :numero , :complemento)");
                $sql->bindParam("cep",$cep);
                $sql->bindParam("rua",$rua);
                $sql->bindParam("cidade",$cidade);
                $sql->bindParam("estado",$estado);
                $sql->bindParam("pais",$pais);
                $sql->bindParam("numero",$numero);
                $sql->bindParam("complemento",$complemento);
                
                $cep = $endereco->getCep();
                $rua = $endereco->getRua();
                $cidade = $endereco->getCidade();
                $estado = $endereco->getEstado();
                $pais = $endereco->getPais();
                $numero = $endereco->getNumero();
                $complemento = $endereco->getComplemento();
                
                $sql->execute();
                $last_id = $minhaConexao->lastInsertId();
                $endereco->setIdEndereco($last_id);
                return $last_id;
             }
             catch(PDOException $e){ 
                echo "entrou no catch".$e->getmessage();
                return 0;
             }
        }

        /**
         * Get the value of idEndereco
         */ 
        public function getIdEndereco()
        {
                return $this->idEndereco;
        }

        /**
         * Set the value of idEndereco
         *
         * @return  self
         */ 
        public function setIdEndereco($idEndereco)
        {
                $this->idEndereco = $idEndereco;

                return $this;
        }
    }
?>    