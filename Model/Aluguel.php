<?php
require_once "Model/Imovel.php";
    Class Aluguel
    {
      private $idAluguel;
      private $locatario;
      private $imovel;
      private $periodo;
      private $cartao;
      private $checked;
      private $cancelado;

      function __construct($imovel ,$periodo, $locatario ,$cartao) {
         $this->locatario = $locatario;
         $this->imovel = $imovel;
         $this->periodo = $periodo;
         $this->cartao = $cartao;
         $this->checked = 0;
         $this->cancelado = 0;
       }

        /**
         * Get the value of locatario
         */ 
        public function getLocatario()
        {
                return $this->locatario;
        }

        /**
         * Set the value of locatario
         *
         * @return  self
         */ 
        public function setLocatario($locatario)
        {
                $this->locatario = $locatario;

                return $this;
        }

        /**
         * Get the value of imovel
         */ 
        public function getImovel()
        {
                return $this->imovel;
        }

        /**
         * Set the value of imovel
         *
         * @return  self
         */ 
        public function setImovel($imovel)
        {
                $this->imovel = $imovel;

                return $this;
        }

        /**
         * Get the value of periodo
         */ 
        public function getPeriodo()
        {
                return $this->periodo;
        }

        /**
         * Set the value of periodo
         *
         * @return  self
         */ 
        public function setPeriodo($periodo)
        {
                $this->periodo = $periodo;

                return $this;
        }

        /**
         * Get the value of cartao
         */ 
        public function getCartao()
        {
                return $this->cartao;
        }

        /**
         * Set the value of cartao
         *
         * @return  self
         */ 
        public function setCartao($cartao)
        {
                $this->cartao = $cartao;

                return $this;
        }

        /**
         * Get the value of checked
         */ 
        public function getChecked()
        {
                return $this->checked;
        }

        /**
         * Set the value of checked
         *
         * @return  self
         */ 
        public function setChecked($checked)
        {
                $this->checked = $checked;

                return $this;
        }

        /**
         * Get the value of cancelado
         */ 
        public function getCancelado()
        {
                return $this->cancelado;
        }

        /**
         * Set the value of cancelado
         *
         * @return  self
         */ 
        public function setCancelado($cancelado)
        {
                $this->cancelado = $cancelado;

                return $this;
        }

        public function cadastrar($aluguel) {
         try{  
             $minhaConexao = Conexao::getConexao();
             $sql = $minhaConexao->prepare("insert into bd_airbnb.alugueis (checked , cancelado ,
               imoveis_idimoveis, periodos_idperiodos , locatario , cartao) values (:checked, :cancelado , :imoveis_idimoveis, :periodos_idperiodos,
               :locatario , :cartao)");
             $sql->bindParam("checked",$checked);
             $sql->bindParam("cancelado",$cancelado);
             $sql->bindParam("imoveis_idimoveis",$imovel);
             $sql->bindParam("periodos_idperiodos",$periodo);
             $sql->bindParam("locatario",$locatario);
             $sql->bindParam("cartao",$idCartao);
             
             $checked = $aluguel->getChecked();
             $cancelado = $aluguel->getCancelado();
             $imovel = $aluguel->getImovel();
             $periodo = $aluguel->getPeriodo();
             $locatario = $aluguel->getLocatario();
             $idCartao = $aluguel->getCartao();
                  
             $sql->execute();
             $last_id = $minhaConexao->lastInsertId();
             $aluguel->setIdAluguel($last_id);
             return $last_id;
          }
          catch(PDOException $e){ 
             echo "entrou no catch".$e->getmessage();
             return 0;
          }
     }

     public static function getAlugueisLocatario($id)
    {
        try {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select *, bd_airbnb.imoveis.usuarios_idusuarios as anfitriao,
            bd_airbnb.tipos.nome as tipo from (((bd_airbnb.imoveis
            inner join bd_airbnb.alugueis 
            on bd_airbnb.alugueis.imoveis_idimoveis = bd_airbnb.imoveis.idimoveis)
            inner join enderecos 
            on bd_airbnb.enderecos.idenderecos = bd_airbnb.imoveis.enderecos_idenderecos)
            inner join bd_airbnb.tipos 
            on bd_airbnb.tipos.idtipos = bd_airbnb.imoveis.tipos_idtipos)
            where locatario = :id");
            $sql->bindParam("id", $id);

            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $alugueis = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $imovel = new Imovel(
                    $linha["anfitriao"],
                    $linha["cartoes_idcartao"],
                    $linha["cidade"],
                    $linha['capacidade'],
                    $linha['descricao'],
                    $linha['tipo'],
                    $linha['preco_diaria'],
                    $linha['imagem']
                );
                $imovel->setIdImovel($linha['idimoveis']);
                $aluguel = new Aluguel($imovel, $linha["periodos_idperiodos"], $linha["locatario"], $linha["cartao"]);
                $aluguel->setIdAluguel($linha["idalugueis"]);
                $alugueis[$i] = $aluguel;
                $i++;
            }

            return $alugueis;
        } catch (PDOException $e) {
            echo "entrou no catch" . $e->getmessage();
            return 0;
        }
    }

    public static function getAlugueisImovel($idAluguel)
    {
        try {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("select *, bd_airbnb.imoveis.usuarios_idusuarios as anfitriao,
            bd_airbnb.tipos.nome as tipo from (((bd_airbnb.imoveis
            inner join bd_airbnb.alugueis 
            on bd_airbnb.alugueis.imoveis_idimoveis = bd_airbnb.imoveis.idimoveis)
            inner join enderecos 
            on bd_airbnb.enderecos.idenderecos = bd_airbnb.imoveis.enderecos_idenderecos)
            inner join bd_airbnb.tipos 
            on bd_airbnb.tipos.idtipos = bd_airbnb.imoveis.tipos_idtipos)
            where idalugueis = :idAluguel");
            $sql->bindParam("idAluguel", $idAluguel);

            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $imovel = new Imovel(
                    $linha["anfitriao"],
                    $linha["cartoes_idcartao"],
                    $linha["cidade"],
                    $linha['capacidade'],
                    $linha['descricao'],
                    $linha['tipo'],
                    $linha['preco_diaria'],
                    $linha['imagem']
                );
                $imovel->setIdImovel($linha['idimoveis']);
                $aluguel = new Aluguel($imovel, $linha["periodos_idperiodos"], $linha["locatario"], $linha["cartao"]);
                $aluguel->setIdAluguel($linha["idalugueis"]);                
            }

            return $aluguel;
        } catch (PDOException $e) {
            echo "entrou no catch" . $e->getmessage();
            return 0;
        }
    }


      /**
       * Get the value of idAluguel
       */ 
      public function getIdAluguel()
      {
            return $this->idAluguel;
      }

      /**
       * Set the value of idAluguel
       *
       * @return  self
       */ 
      public function setIdAluguel($idAluguel)
      {
            $this->idAluguel = $idAluguel;

            return $this;
      }
    }