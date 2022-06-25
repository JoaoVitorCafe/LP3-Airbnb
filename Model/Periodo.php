<?php
require_once "Conexao.php";
    class Periodo 
    {
        private $idPeriodo;
        private $idImovel;
        private $inicio;
        private $fim;
        private $emUso;

        function __construct($idImovel , $inicio , $fim) {
            $this->idImovel = $idImovel;
            $this->inicio = $inicio;
            $this->fim = $fim;
            $this->emUso = 0;
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
         * Get the value of idPeriodo
         */ 
        public function getIdPeriodo()
        {
                return $this->idPeriodo;
        }

        /**
         * Set the value of idPeriodo
         *
         * @return  self
         */ 
        public function setIdPeriodo($idPeriodo)
        {
                $this->idPeriodo = $idPeriodo;

                return $this;
        }

        public function format(){
                $inicio = new DateTime($this->getInicio());
                $fim = new DateTime($this->getFim());
                return $inicio->format('d-m-Y').' ----- '.$fim->format('d-m-Y');
        }

        public function cadastrar($periodo) {
                try{
                    $minhaConexao = Conexao::getConexao();
                    $sql = $minhaConexao->prepare("insert into bd_airbnb.periodos (imoveis_idimoveis, inicio, fim , emUso) 
                    values (:imoveis_idimoveis,:inicio,:fim ,:emUso)");
                    $sql->bindParam("imoveis_idimoveis",$idImovel);
                    $sql->bindParam("inicio",$inicio);
                    $sql->bindParam("fim",$fim);
                    $sql->bindParam("emUso",$emUso);
                    $idImovel = $periodo->getIdImovel();
                    $inicio = $periodo->getInicio();
                    $fim = $periodo->getFim();
                    $emUso = $periodo->getEmUso();      

                    $sql->execute();
         
                    $last_id = $minhaConexao->lastInsertId();
                    $periodo->setIdPeriodo($last_id);

                    return $last_id;
                 }
                 catch(PDOException $e){
                     echo "entrou no catch".$e->getmessage();
                     return 0;
                 }
            }

        public static function find($id){
                try{
                    $minhaConexao = Conexao::getConexao();
                    $sql = $minhaConexao->prepare("select * from bd_airbnb.periodos where imoveis_idimoveis = :id");
                    $sql->bindParam("id",$id);
                
                    $sql->execute();
                    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                    
                    $periodos = array();
                    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $periodo = new Periodo($linha['imoveis_idimoveis'] , $linha['inicio'], $linha['fim']);  
                    $periodo->setIdPeriodo($linha['idperiodos']);
                    array_push($periodos , $periodo);
                }
                        
                return $periodos;
                
                }
    
               catch(PDOException $e){
                echo"entrou no catch".$e->getmessage();
                return 0;
               }
            }

        /**
         * Get the value of emUso
         */ 
        public function getEmUso()
        {
                return $this->emUso;
        }

        /**
         * Set the value of emUso
         *
         * @return  self
         */ 
        public function setEmUso($emUso)
        {
                $this->emUso = $emUso;

                return $this;
        }
    }
?>    