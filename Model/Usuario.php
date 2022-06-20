<?php
require_once "Conexao.php";
    class Usuario
    {
        private $id;
        private $nome;
        private $senha;
        private $email;
        private $telefone;
        private $pais;
        private $cartoes = array();
        private $imoveisCadastrados = array();
        private $imoveisAlugados = array();
        private $imagem;

        function __construct($nome , $email , $senha , $telefone  , $pais) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->telefone = $telefone;
            $this->pais = $pais;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        } 

        public function getEmail()
        {
           return $this->email;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        } 

        public function getSenha()
        {
           return $this->senha;
        }

        public function setNome($nome)
        {
            $this->nome= $nome;
        } 

        public function getNome()
        {
            return $this->nome;
        }

        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        } 

        public function getTelefone()
        {
           return $this->telefone;
        }

        public function setPais($pais)
        {
            $this->pais = $pais;
        } 

        public function getPais()
        {
           return $this->pais;
        }

        public function setCartoes($cartao)
        {
            array_push($this->cartoes, $cartao);
        } 

        public function getCartoes()
        {
            return $this->cartoes;
        }

        public function setimoveisCadastrados($imovel)
        {
            array_push($this->imoveisCadastrados , $imovel);
        } 

        public function getimoveisCadastrados()
        {
            return $this->imoveisCadastrados;
        }

        public function setimoveisAlugados($imovel)
        {
            array_push($this->imoveisAlugados , $imovel);
        } 

        public function getimoveisAlugados()
        {
            return $this->imoveisAlugados;
        }
     
        public function getId()
        {
                return $this->id;
        }

     
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function cadastrar($usuario) {
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_airbnb.usuarios (nome, email, senha ,telefone ,pais) values (:nome, :email , :senha, :telefone, :pais)");
                $sql->bindParam("nome",$nome);
                $sql->bindParam("email",$email);
                $sql->bindParam("senha",$senha);
                $sql->bindParam("telefone",$telefone);
                $sql->bindParam("pais",$pais);
                $imagem = $usuario->getImagem();
                $nome = $usuario->getNome();
                $email = $usuario->getEmail();
                $senha = $usuario->getSenha();
                $telefone = $usuario->getTelefone();
                $pais = $usuario->getPais();
                $sql->execute();
     
                $last_id = $minhaConexao->lastInsertId();
                $usuario->setId($last_id);
                
                $imagem = $usuario->getImagem();  
                if($imagem != NULL) {
                  echo "entrou no if da imagem !=null";
                 $nomeFinal = $last_id.'.jpg';               
                 if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
                    $sql = $minhaConexao->prepare("update bd_airbnb.usuarios set imagem = :imagem where idusuarios = :idusuarios");
                    $sql->bindParam("imagem",$nomeFinal);
                    $sql->bindParam("idusuarios",$last_id);
                    $sql->execute();
                  }
                }

                return $last_id;
             }
             catch(PDOException $e){
                 echo "entrou no catch".$e->getmessage();
                 return 0;
             }
        }

        public static function pesquisaUsuario($email , $senha){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.usuarios where email=:email and senha=:senha");
                $sql->bindParam("email",$email);
                $sql->bindParam("senha",$senha);
            
               $sql->execute();
               $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
               
               $usuario = array(NULL , NULL);
               while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $usuario[0] = $linha['idusuarios'];
                $usuario[1]= $linha['nome'];
            }

              return $usuario;
            
           }
           catch(PDOException $e){
                return 0;
           }
        }

        public static function find($id){
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("select * from bd_airbnb.usuarios where idusuarios = :id");
                $sql->bindParam("id",$id);
            
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario($linha['nome'] , $linha['email'],
                $linha['senha'] , $linha['telefone'] , $linha['pais']);  
                   
                $usuario->setId($linha['idusuarios']);
            }
                    
            return $usuario;
            
            }

           catch(PDOException $e){
            echo"entrou no catch".$e->getmessage();
            return 0;
           }
        }

        public function getImagem()
        {
                return $this->imagem;
        }


        public function setImagem($imagem)
        {
                $this->imagem = $imagem;

                return $this;
        }
    }
?>