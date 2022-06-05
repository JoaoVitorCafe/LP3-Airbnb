<?php

    class Usuario
    {
        private $nome;
        private $senha;
        private $email;
        private $cpf;
        private $telefone;
        private $cidade;
        private $estado;
        private $pais;
        private $cartoes = array();
        private $imoveisCadastrados = array();
        private $imoveisAlugados = array();

        function __construct($nome , $senha , $email , $cpf , $telefone , $cidade , $estado , $pais) {
            $this->nome = $nome;
            $this->senha = $senha;
            $this->email = $email;
            $this->cpf = $cpf;
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


        /**
         * Get the value of cpf
         */ 
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }
    }
?>