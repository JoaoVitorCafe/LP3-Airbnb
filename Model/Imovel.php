<?php
require_once "Conexao.php";
    class Imovel 
    {
        private $idImovel;
        private $anfitriao;
        private $cartao_recebimento;
        private $endereco;
        private $capacidade;
        private $descricao;
        private $tipo;
        private $preco_diaria;
        private $caracteristicas = array();
        private $anuncio;
        private $comentarios = array();
        private $alugueis = array() ;
        private $periodos = array() ;
        // private $imagem;

        function __construct($anfitriao , $cartao_recebimento , $endereco , $capacidade  , $descricao , $tipo , $preco_diaria) {
            $this->anfitriao = $anfitriao;
            $this->cartao_recebimento = $cartao_recebimento;
            $this->endereco = $endereco;
            $this->capacidade = $capacidade;
            $this->descricao = $descricao;
            $this->tipo = $tipo;
            $this->preco_diaria = $preco_diaria;
        }

        public function getIdImovel()
        {
                return $this->idImovel;
        }
        
        public function setIdImovel($idImovel)
        {
                $this->idImovel = $idImovel;

                return $this;
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
            array_push($this->caracteristicas, $caracteristica);
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
            array_push($this->comentarios , $comentario );
        }

        public function getComentarios()
        {
           return $this->comentarios;
        }

        public function setAluguel($aluguel)
        {
            array_push($this->alugueis, $aluguel);
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
                array_push($this->periodos ,$periodo);

                return $this;
        }

        public function cadastrar($imovel) {
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_airbnb.imoveis 
                (capacidade, descricao, imagem ,preco_diaria , enderecos_idenderecos , usuarios_idusuarios , tipos_idtipos, cartoes_idcartao) 
                values (:capacidade, :descricao , :imagem, :preco_diaria, :enderecos_idenderecos, :usuarios_idusuarios, :tipos_idtipos ,:cartoes_idcartao)");
                $sql->bindParam("capacidade",$capacidade);
                $sql->bindParam("descricao",$descricao);
                $sql->bindParam("imagem",$imagem);
                $sql->bindParam("preco_diaria",$preco_diaria);
                $sql->bindParam("enderecos_idenderecos",$endereco);
                $sql->bindParam("usuarios_idusuarios",$anfitriao);
                $sql->bindParam("tipos_idtipos",$tipo);
                $sql->bindParam("cartoes_idcartao",$cartao_recebimento);
                $capacidade = $imovel->getCapacidade();
                $descricao = $imovel->getDescricao();
                $imagem = "teste.jpg";
                $preco_diaria = $imovel->getPreco_diaria();
                $endereco = $imovel->getEndereco();
                $anfitriao = $imovel->getAnfitriao();
                $tipo = $imovel->getTipo();
                $cartao_recebimento = $imovel->getCartao_recebimento();
                $sql->execute();
     
                $last_id = $minhaConexao->lastInsertId();
                $imovel->setIdImovel($last_id);
                $caracteristicas = $imovel->getCaracteristicas();

                foreach ($caracteristicas as $caracteristica) {
                    $sql = $minhaConexao->prepare("insert into bd_airbnb.imoveis_has_caracteristicas 
                    (imoveis_idimoveis , caracteristicas_idcaracteristicas) values (:imoveis_idimoveis ,:caracteristicas_idcaracteristicas)");
                    $sql->bindParam("imoveis_idimoveis",$last_id);
                    $sql->bindParam("caracteristicas_idcaracteristicas",$caracteristica);
                    $sql->execute();
                }
                
                // $imagem = $liv->getImagem();  
                // if($imagem != NULL) {
                //   echo "entrou no if da imagem !=null";
                //  $nomeFinal = $last_id.'.jpg';               
                //  if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
                //     $sql = $minhaConexao->prepare("update bd_airbnb.usuarios set imagem = :imagem where codigo = :codigo");
                //     $sql->bindParam("imagem",$nomeFinal);
                //     $sql->bindParam("codigo",$last_id);
                //     $sql->execute();
                //   }
                // }
                
                return $last_id;
             }
             catch(PDOException $e){
                 echo"entrou no catch".$e->getmessage();
                 return 0;
             }
        }

        public static function buscarImoveisCadastrados($id){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.imoveis where usuarios_idusuarios = :id");
                $sql->bindParam("id",$id);
            
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
                $imoveis=array();
                $i=0;
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $imovel = new Imovel($linha["usuarios_idusuarios"] , $linha["cartoes_idcartao"] , $linha["enderecos_idenderecos"] ,
                $linha['capacidade'] , $linha['descricao'] , intval($linha['tipos_idtipos']) , $linha['preco_diaria']);  
                $imovel->setIdImovel($linha['idimoveis']);
                $imoveis[$i] = $imovel;
                $i++;
            }
                    
            return $imoveis;
            
            }

           catch(PDOException $e){
            echo"entrou no catch".$e->getmessage();
            return 0;
           }
        }

        public static function find($id){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.imoveis where idimoveis = :id");
                $sql->bindParam("id",$id);
            
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $imovel = new Imovel($linha["usuarios_idusuarios"] , $linha["cartoes_idcartao"] , $linha["enderecos_idenderecos"] ,
                $linha['capacidade'] , $linha['descricao'] , intval($linha['tipos_idtipos']) , $linha['preco_diaria']);  
                $imovel->setIdImovel($linha['idimoveis']);
            }
                    
            return $imovel;
            
            }

           catch(PDOException $e){
            echo"entrou no catch".$e->getmessage();
            return 0;
           }
        }

        public static function findTipo($id){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.tipos where idtipos = :id");
                $sql->bindParam("id",$id);
            
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $tipo = $linha['nome'];
                }
                    
            return $tipo;
            
            }

           catch(PDOException $e){
            echo"entrou no catch".$e->getmessage();
            return 0;
           }
        }
    
        public static function findCaracteristicas($id){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.imoveis_has_caracteristicas inner join bd_airbnb.caracteristicas 
                on bd_airbnb.imoveis_has_caracteristicas.caracteristicas_idcaracteristicas = bd_airbnb.caracteristicas.idcaracteristicas
                where bd_airbnb.imoveis_has_caracteristicas.imoveis_idimoveis = :id;");
                $sql->bindParam("id",$id);
            
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                
                $caracteristicas = array();
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                array_push($caracteristicas , $linha['nome']);
                }
                    
                return $caracteristicas;
            
            }

           catch(PDOException $e){
            echo"entrou no catch".$e->getmessage();
            return 0;
           }
        }
    
    
    }
?>