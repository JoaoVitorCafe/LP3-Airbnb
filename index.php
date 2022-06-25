<?php
	//testa a variável url que veio lá do htaccess
	if (isset($_GET['url'])) //se estiver preenchida, pega o valor
	  {
            $url =  strtoupper($_GET['url']);
    		switch ($url){
	    		case "CADASTRARUSUARIO":
					require "Controller/ControllerCadastroUser.php";    
				    $controlador = new ControllerCadastroUser();
					$controlador->processaRequisicao();
					break;
				case "INCLUIRUSUARIO":
					require "Controller/ControllerNovoUser.php";    
					$controlador = new ControllerNovoUser();
					$controlador->processaRequisicao();
					break;
				case "PAGINALOGIN":
					require "Controller/ControllerPaginaLogin.php";    
					$controlador = new ControllerPaginaLogin();
					$controlador->processaRequisicao();
					break;
				case "LOGIN":
					require "Controller/ControllerLogin.php";    
					$controlador = new ControllerLogin();
					$controlador->processaRequisicao();
					break;
				case "LOGOUT":
					require "Controller/ControllerLogout.php";    
					$controlador = new ControllerLogout();
					$controlador->processaRequisicao();
					break;
				case "PERFIL":
					require "Controller/ControllerPerfil.php";    
					$controlador = new ControllerPerfil();
					$controlador->processaRequisicao();
					break;
				case "HOME":
					require "Controller/ControllerHome.php";    
					$controlador = new ControllerHome();
					$controlador->processaRequisicao();
					break;
				case "CADASTRARIMOVEL":
					require "Controller/ControllerCadastroImovel.php";    
					$controlador = new ControllerCadastroImovel();
					$controlador->processaRequisicao();
					break;
				case "NOVOIMOVEL":
					require "Controller/ControllerNovoImovel.php";    
					$controlador = new ControllerNovoImovel();
					$controlador->processaRequisicao();
					break;
				case "DETALHES":
					require "Controller/ControllerDetalhes.php";    
					$controlador = new ControllerDetalhes();
					$controlador->processaRequisicao();
					break;
				case "CADASTRARPERIODO":
					require "Controller/ControllerCadastroPeriodo.php";    
					$controlador = new ControllerCadastroPeriodo();
					$controlador->processaRequisicao();
					break;
				case "PESQUISAIMOVEL":
					require "Controller/ControllerPesquisaImovel.php";    
					$controlador = new ControllerPesquisaImovel();
					$controlador->processaRequisicao();
					break;
				case "ANUNCIAR":
					require "Controller/ControllerAnunciar.php";    
					$controlador = new ControllerAnunciar();
					$controlador->processaRequisicao();
					break;
				case "ALUGARIMOVEL":
					require "Controller/ControllerAlugarImovel.php";    
					$controlador = new ControllerAlugarImovel();
					$controlador->processaRequisicao();
					break;
				default:
				    require "Controller/ControllerHome.php";
				    $controlador = new ControllerHome();
				    $controlador->processaRequisicao();
				    break;
				}
		} else                     //senão, vai para uma página padrão, neste caso a home do site
            $url = '404.php';
?>
	