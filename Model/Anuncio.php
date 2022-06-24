<?php

    class Anuncio 
    {
        private $idAnuncio;
        private $idImovel;
        private $idCartao;
        private $preco;
        private $tipo;
        private $dataTermino;

        function __construct($idImovel ,  $idCartao , $preco , $tipo , $dataTermino) {
            $this->idImovel = $idImovel;
            $this->idCartao = $idCartao;
            $this->preco = $preco;
            $this->tipo = $tipo;
            $this->dataTermino = $dataTermino;
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


        public function cadastrar($anuncio) {
                try{  
                    $minhaConexao = Conexao::getConexao();
                    $sql = $minhaConexao->prepare("insert into bd_airbnb.anuncios (imoveis_idimoveis, preco , tipo , dataTermino , cartoes_idcartao) values (:imoveis_idimoveis, :preco , :tipo, :dataTermino, :cartoes_idcartao)");
                    $sql->bindParam("imoveis_idimoveis",$idImovel);
                    $sql->bindParam("preco",$preco);
                    $sql->bindParam("tipo",$tipo);
                    $sql->bindParam("dataTermino",$dataTermino);
                    $sql->bindParam("cartoes_idcartao",$idCartao);
                    
                    $idImovel = $anuncio->getIdImovel();
                    $preco = $anuncio->getPreco();
                    $tipo = $anuncio->getTipo();
                    $dataTermino = $anuncio->getDataTermino();
                    $idCartao = $anuncio->getIdCartao();
                         
                    $sql->execute();
                    $last_id = $minhaConexao->lastInsertId();
                    $anuncio->setIdAnuncio($last_id);
                    return $last_id;
                 }
                 catch(PDOException $e){ 
                    echo "entrou no catch".$e->getmessage();
                    return 0;
                 }
            }

            public static function find($idImovel) {
                try{  
                    $minhaConexao = Conexao::getConexao();
                    $sql = $minhaConexao->prepare("select * from bd_airbnb.anuncios where imoveis_idimoveis = :idImovel");
                    $sql->bindParam("idImovel",$idImovel);
                    $sql->execute();
    
                    $idImovel = 0;
                    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $idImovel = $linha['imoveis_idimoveis'];
                    
                    }
    
                    return $idImovel;
                } 
                
                catch(PDOException $e){
                    echo"entrou no catch".$e->getmessage();
                    return 0;
               }
            }

    }
?>    