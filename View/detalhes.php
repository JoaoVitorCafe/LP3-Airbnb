<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="View/styles/detalhes.css">
  <title>Detalhes</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light navbar-light py-3">
    <div class="container">
      <a href="HOME" class="navbar-brand">
        <img src="View/styles/imagens_carrossel/imagem_navbar.webp" alt="" class="img-logo">
        CoffeeHousing
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
        <?php if (isset($_SESSION['id'])) { ?>
          <div class="navbar-nav ms-auto">
            <div class="p-2">
              <span class="round">
                <a href="PERFIL">
                  <img src="View/styles/imagens_carrossel/foto_mulher.jpg" alt="user" width="50">
                </a>
              </span>
            </div>
            <p> <?php echo $_SESSION['nome'] ?> </p>
            <li class="nav-item">
              <a href="LOGOUT" class="nav-link">Sair</a>
            </li>
          </div>
      </div>

    <?php } else { ?>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="PAGINALOGIN" class="nav-link">Entrar</a>
        </li>
        <li class="nav-item">
          <a href="CADASTRARUSUARIO" class="nav-link">Cadastrar</a>
        </li>
      </ul>
    <?php } ?>

    </div>
    </div>
  </nav>

  <div class="container">

    <div class="detalhes">
      <?php if ($dataTermino) { ?>
        <h4 class="text-warning">Destaque</h3>

          <?php if (isset($_SESSION['id'])) { ?>
            <?php if ($anfitriao->getId() == $_SESSION["id"]) { ?>
              <h6>Expira em <?php echo $dataTermino ?></h3>
              <?php } ?>
            <?php } ?>

          <?php } ?>

          <h1><?php echo $tipo; ?></h1>
          <h3><?php echo $imovel->getDescricao(); ?></h3>

          <p>Anfitrião <?php echo $anfitriao->getNome(); ?></p>
          <p><?php echo $endereco->getPais(); ?></p>


          <p><i class="fa-solid fa-person"></i>
            <?php echo $imovel->getCapacidade(); ?>
          </p>

          <p><?php echo $endereco->format(); ?></p>

          <h6>Períodos disponiveis</h6>
          <?php if (!empty($periodos)) { ?>
            <?php foreach ($periodos as $periodo) { ?>
              <p><?php echo $periodo->format(); ?></p>
            <?php } ?>
          <?php } else { ?>
            <h6 class="m-2"><?php echo "Sem periodos disponíveis" ?></h6>
          <?php } ?>

          <h6>Diária</h6>
          <h6>R$<?php echo $imovel->getPreco_diaria(); ?></h6>

          <?php foreach ($caracteristicas as $caracteristica) { ?>
            <p> <?php echo $caracteristica; ?></p>
          <?php } ?>

          <?php if($checked){ ?>
              <h6 class="text-success m-2"> <?php echo "Você fez check-in nessa locacao"?> </h6>
          <?php } ?>
          
          <?php if($cancelado){ ?>
              <h6 class="text-danger m-2">Você cancelou essa locacao</h6>
          <?php } ?>

          <div class="d-flex justify-content-between">
            <?php if (isset($_SESSION['id']) and $_SESSION['id'] == $imovel->getAnfitriao()) { ?>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#anuncioModal">
                Pagar para divulgar
              </button>

              <!-- Modal -->
              <div class="modal fade" id="anuncioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Qual o plano de anuncios deseja?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="ANUNCIAR" method="POST" name="alugarimovel" class="d-flex flex-column">
                        <div class="form-group">
                          <label for="name">Nome completo</label>
                          <input type="text" class="form-control" id="name" name="titular" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                          <label for="cpf">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                        <div class="form-group">
                          <label for="numero_cartao">Numero do cartão</label>
                          <input type="text" class="form-control" placeholder="1234 1234 1234 1234" name="numero_cartao">
                        </div>
                        <div class="form-group">
                          <label for="codigo_seguranca">CVV</label>
                          <input type="text" class="form-control" name="codigo_seguranca" placeholder="699">
                        </div>
                        <div class="form-group">
                          <label for="validade_cartao">Data de validade</label>
                          <input type="date" class="form-control" id="validade_cartao" name="validade_cartao">
                        </div>
                        <div class="d-flex flex-column m-2">

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="anuncio" id="check1" value="25|+1 week" checked>
                            <label class="form-check-label" for="check1">R$25,00 - 1 semana</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="anuncio" id="check2" value="40|+2 weeks">
                            <label class="form-check-label" for="check2">R$40,00 - 2 semanas</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="anuncio" id="check3" value="100|+4 weeks">
                            <label class="form-check-label" for="check3">R100,00 - 4 semanas</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="anuncio" id="check3" value="250|+3 months">
                            <label class="form-check-label" for="check3">R250,00 - 3 meses</label>
                          </div>
                          <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">

                        </div>

                        <button type="submit" class="btn btn-primary">Realizar pagamento</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrarBackdrop">
                Cadastrar Períodos
              </button>

              <!-- Modal -->
              <div class="modal fade" id="cadastrarBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checklabel">Cadastre um perído</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <form action="CADASTRARPERIODO" method="POST" name="cadastrarperiodo">
                        <div class="campo d-flex justify-content-between pb-5">
                          <div class="form-group">
                            <label for="inicio_locacao">Inicio de perído para locação</label>
                            <input type="date" class="form-control" id="inicio_locacao" name="inicio_locacao">
                          </div>

                          <div class="form-group">
                            <label for="fim_locacao">Fim de perído para locação</label>
                            <input type="date" class="form-control" id="fim" name="fim_locacao">
                          </div>
                          <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar período</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            <?php } else if ((isset($_SESSION['id']) and $_SESSION['id'] == $idLocatario)) { ?>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkBackdrop"
               <?php echo ($checked or $cancelado) ?  "disabled" : "" ?> >
                Check-in
              </button>

              <!-- Modal -->
              <div class="modal fade" id="checkBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checklabel">Confirme se está tudo certo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="CHECKIN" method="post">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="check" id="check1" value="1" checked>
                          <label class="form-check-label" for="check1">Sim, tudo certo</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="check" id="check2" value="0">
                          <label class="form-check-label" for="check2">Não, algo está errado</label>
                        </div>
                        <input type="hidden" name="idAluguel" value="<?php echo $idAluguel?>">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelarBackdrop"
              <?php echo $cancelado ?  "disabled" : "" ?> >
                Cancelar locação
              </button>

              <!-- Modal -->
              <div class="modal fade" id="cancelarBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checklabel">Tem certeza que deseja cancelar?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="CANCELARLOCACAO" method="post">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="cancelar" id="cancelar1" value="1" checked>
                          <label class="form-check-label" for="cancelar1">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="cancelar" id="cancelar2" value="0">
                          <label class="form-check-label" for="cancelar2">Não</label>
                        </div>
                        <input type="hidden" name="idAluguel" value="<?php echo $idAluguel?>">
                        <button type="submit" class="btn btn-danger">Cancelar locacão</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } else if ((isset($_SESSION['id']) and $_SESSION['id'] != $imovel->getAnfitriao())) { ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alugarBackdrop"
                <?php echo empty($periodos) ? "disabled" : "" ?>>
                  Alugar
                </button>
  
              <!-- Modal -->
              <div class="modal fade" id="alugarBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="checklabel">Dados para pagamento</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <form action="ALUGARIMOVEL" method="POST" name="alugarimovel" class="d-flex flex-column">
                        <p>Endereço : <?php echo $endereco->format(); ?></p>
                        <h6>Preco : R$<?php echo $imovel->getPreco_diaria(); ?></h6>
                        <div class="form-group">
                          <label for="name">Nome completo</label>
                          <input type="text" class="form-control" id="name" name="titular" placeholder="Nome completo" required>
                        </div>
                        <div class="form-group">
                          <label for="cpf">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
                        </div>
                        <div class="form-group">
                          <label for="numero_cartao">Numero do cartão</label>
                          <input type="text" class="form-control" placeholder="1234 1234 1234 1234" name="numero_cartao" required>
                        </div>
                        <div class="form-group">
                          <label for="codigo_seguranca">CVV</label>
                          <input type="text" class="form-control" name="codigo_seguranca" placeholder="699" required>
                        </div>
                        <div class="form-group">
                          <label for="validade_cartao">Data de validade</label>
                          <input type="date" class="form-control" id="validade_cartao" name="validade_cartao" required>
                        </div>
                        <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">

                        <div class="d-flex flex-column m-2">

                          <h6>Escolha um dos períodos disponíveis</h6>
                          <?php if (!empty($periodos)) { ?>
                            <?php foreach ($periodos as $periodo) { ?>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="periodo" id="" value="<?php echo $periodo->getIdPeriodo(); ?>" checked>
                                <label class="form-check-label" for=""><?php echo $periodo->format() ?></label>
                              </div>
                            <?php } ?>
                          <?php } else { ?>
                            <?php echo "Sem periodos disponíveis" ?>
                          <?php } ?>

                        </div>

                        <button type="submit" class="btn btn-primary">Realizar pagamento</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <form action="CADASTRARUSUARIO" method="post">
                <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">
                <button type="submit" class="btn btn-primary"> Cadastre-se para alugar imovéis </button>
              </form>
            <?php } ?>

          </div>

    </div>

    <div class="apresentacao">

      <img src="View/styles/imagens_carrossel/casa_pagamento.jpg" class="image" alt="">

      <img src="View/styles/imagens_carrossel/casa_pagamento.jpg" class="image" alt="">

      <img src="View/styles/imagens_carrossel/casa_pagamento.jpg" class="image" alt="">

      <img src="View/styles/imagens_carrossel/casa_pagamento.jpg" class="image" alt="">


    </div>

  </div>

  <div class="container d-flex justify-content-center mt-10">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Comments</h4>
            <h6 class="card-subtitle">Latest Comments section by users</h6>
            <?php if ((isset($_SESSION['id']) and $_SESSION['id'] == $idLocatario)) { ?>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#commentBackdrop">
                Adicionar comentário
              </button>

              <!-- Modal -->
              <div class="modal fade" id="commentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="commentLabel">Adicione um comentário</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="">
                        <textarea name="comentario" id="comentario" cols="30" rows="10" class="form-control" placeholder="Escreva algo aqui..."></textarea>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
          <div class="comment-widgets m-b-20">
            <div class="d-flex flex-row comment-row">
              <div class="p-2"><span class="round"><img src="View/styles/imagens_carrossel/foto_mulher.jpg" alt="user" width="50"></span></div>
              <div class="comment-text w-100">
                <h5>Sarah</h5>
                <div class="comment-footer"><span class="date">April 14, 2022</span></div>
                <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
              </div>
            </div>
            <div class="d-flex flex-row comment-row ">
              <div class="p-2"><span class="round"><img src="View/styles/imagens_carrossel/foto_homem_pagamento.jpg" alt="user" width="50"></span></div>
              <div class="comment-text active w-100">
                <h5>John</h5>
                <div class="comment-footer">
                  <span class="date">March 13, 2022</span>
                </div>
                <p class="m-b-5 m-t-10">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>