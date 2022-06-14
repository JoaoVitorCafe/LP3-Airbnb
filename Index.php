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
				case "LOGIN":
					require "Controller/ControllerLogin.php";    
					$controlador = new ControllerCadastroUser();
					$controlador->processaRequisicao();
					break;
				case "PERFIL":
						require "Controller/ControllerPerfil.php";    
						$controlador = new ControllerPerfil();
						$controlador->processaRequisicao();
						break;
				default:
				    require "Controller/ControllerHome.php";
				    $controlador = new ControllerCadastroUser();
				    $controlador->processaRequisicao();
				    break;
			}
		} else                     //senão, vai para uma página padrão, neste caso a home do site
            $url = '404.php';
?>
	