<?php
require_once "Conexao.php";
    class Usuario
    {
        private $id;
        private $nome;
        private $senha;
        private $email;
        private $telefone;
        private $cidade;
        private $estado;
        private $pais;
        private $cartoes = array();
        private $imoveisCadastrados = array();
        private $imoveisAlugados = array();
        // private $imagem;

        function __construct($nome , $email , $senha , $telefone , $cidade , $estado , $pais) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->telefone = $telefone;
            $this->cidade = $cidade;
            $this->estado = $estado;
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
            $this->estado = $estado;
        } 

       public function getEstado()
       {
        return $this->estado;
       }

        public function setPais($pais)
        {
            $this->pais = $pais;
        } 

        public function getPais()
        {
           return $this->pais;
        }

        public function cadastrar($usuario) {
            try{
                $minhaConexao = Conexao::getConexao();
                $sql = $minhaConexao->prepare("insert into bd_airbnb.usuarios (nome, email, senha ,telefone , cidade , estado , pais) values (:nome, :email , :senha, :telefone, :cidade, :estado, :pais)");
                $sql->bindParam("nome",$nome);
                $sql->bindParam("email",$email);
                $sql->bindParam("senha",$senha);
                $sql->bindParam("telefone",$telefone);
                $sql->bindParam("cidade",$cidade);
                $sql->bindParam("estado",$estado);
                $sql->bindParam("pais",$pais);
                $nome = $usuario->getNome();
                $email = $usuario->getEmail();
                $senha = $usuario->getSenha();
                $telefone = $usuario->getTelefone();
                $cidade = $usuario->getCidade();
                $estado = $usuario->getEstado();
                $pais = $usuario->getPais();
                $sql->execute();
     
                $last_id = $minhaConexao->lastInsertId();
                $usuario->setId($last_id);
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
                 return "entrou no catch".$e->getmessage();
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
            
           }
        }

        public function setCartoes($cartao)
        {
            $this->cartoes_push($cartao);
        } 

        public function getCartoes()
        {
            return $this->cartoes;
        }

        public function setimoveisCadastrados($imovel)
        {
            $this->imoveisCadastrados_push($imovel);
        } 

        public function getimoveisCadastrados()
        {
            return $this->imoveisCadastrados;
        }

        public function setimoveisAlugados($imovel)
        {
            $this->imoveisAlugados_push($imovel);
        } 

        public function getimoveisAlugados()
        {
            return $this->imoveisAlugados;
        }

        public function cadastrarImovel()
        {
           
        }

        public function adicionarCartao()
        {
          
        }

        public function alugarImovel()
        {
            
        }

        public function cancelarLocacao()
        {
            
        }

        public function fazerCheck_in()
        {
          
        }

        public function postarComentario()
        {
          
        }

        public function pagarAnuncio()
        {
            
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
    }
?>