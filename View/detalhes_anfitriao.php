<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="View/styles/detalhes_anfitriao.css">
    <title>Detalhes</title>
</head>
<body>
       <nav class="navbar navbar-expand-lg bg-light navbar-light py-3">
        <div class="container">
          <a href="HOME" class="navbar-brand">
            <img src="View/styles/imagens_carrossel/imagem_navbar.webp" alt="" class="img-logo">
            CoffeeHousing
          </a>
  
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navmenu"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navmenu">
            <div class="navbar-nav ms-auto">
                <div class="p-2">
                <span class="round">
                    <a href="PERFIL">
                      <img src="View/styles/imagens_carrossel/foto_mulher.avif" alt="user" width="50">
                    </a>
                </span>
              </div>
                <p><?php echo $_SESSION['nome'] ?></p>
                <li class="nav-item">
                  <a href="LOGOUT" class="nav-link">Sair</a>
                </li>
              </div>
            </div>
        </div>
      </nav>
    
    <div class="container">

        <div class="detalhes">
            <h1>Casa</h1>
            <h3>Todo conforto em um só lugar</h3>
            
            <p>Anfitrião - João Vítor Café</p>
            <p>Brasil</p>
            
            
            <p><i class="fa-solid fa-person"></i>5</p>

            <p>Av. Alphaville, 289 - Loteamento - Alphaville I, Salvador - BA, 41701-015</p>

            <p>Período disponivel : 10/02/2022 - 20/09/2022 </p>
            <p>Diária - R$ 1000,00</p>
            <p>3 Quartos</p>
            <p>Jacuzzi</p>
            <p>Piscina</p>
            <p>Garagem</p>
            <p>Ar-condicionado</p>


          <div class="d-flex justify-content-between">
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
                    <form action="">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anuncio" id="check1" value="1-semana">
                        <label class="form-check-label" for="check1">R$25,00 - 1 semana</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anuncio" id="check2" value="2-semana">
                        <label class="form-check-label" for="check2">R$40,00 - 2 semanas</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anuncio" id="check3" value="4-semana">
                        <label class="form-check-label" for="check3">R100,00 - 4 semanas</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="anuncio" id="check3" value="3 meses">
                        <label class="form-check-label" for="check3">R250,00 - 3 meses</label>
                      </div>
                      <button type="submit" class="btn btn-success">Pagar</button>
                    </form>
                  </div>
                </div>
            </div>
          </div> 

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cadastrarBackdrop">
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
                      <form action="">
                      <div class="campo d-flex justify-content-between pb-5">
                          <div class="form-group">
                            <label for="inicio_locacao">Inicio de perído para locação</label>
                            <input type="date" class="form-control" id="inicio_locacao" name="inicio_locacao">
                          </div>

                          <div class="form-group">
                              <label for="fim_locacao">Fim de perído para locação</label>
                              <input type="date" class="form-control" id="fim" name="fim_locacao">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Cancelar locacão</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
        
        <div class="apresentacao">
        
        <img src="View/styles/imagens_carrossel/casa_pagamento.avif" class="image" alt="">
        
        <img src="View/styles/imagens_carrossel/casa_pagamento.avif" class="image" alt="">

        <img src="View/styles/imagens_carrossel/casa_pagamento.avif" class="image" alt="">

        <img src="View/styles/imagens_carrossel/casa_pagamento.avif" class="image" alt="">
        
        
    </div>
    
    </div>

    <div class="container d-flex justify-content-center mt-10">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Comments</h4>
                        <h6 class="card-subtitle">Latest Comments section by users</h6>
                    </div>
                    <div class="comment-widgets m-b-20">
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><span class="round"><img src="View/styles/imagens_carrossel/foto_mulher.avif" alt="user" width="50"></span></div>
                            <div class="comment-text w-100">
                                <h5>Sarah</h5>
                                <div class="comment-footer"><span class="date">April 14, 2022</span></div>
                                <p class="m-b-5 m-t-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row ">
                            <div class="p-2"><span class="round"><img src="View/styles/imagens_carrossel/foto_homem_pagamento.avif" alt="user" width="50"></span></div>
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