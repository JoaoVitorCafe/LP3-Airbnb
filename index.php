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
				case "DETALHESANFITRIAO":
					require "Controller/ControllerDetalhesAnfitriao.php";    
					$controlador = new ControllerDetalhesAnfitriao();
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
	