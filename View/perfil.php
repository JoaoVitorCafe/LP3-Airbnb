<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoffeeHousing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="View/styles/perfil.css">
</head>

<body>
  <!-- Navbar -->

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
        <div class="navbar-nav ms-auto">
          <div class="p-2">
            <span class="round">
              <a href="PERFIL">
                <img src='View/styles/imagens_carrossel/foto_homem_pagamento.jpg' alt="user" width="50">
              </a>
            </span>
          </div>
          <p> <?php echo $_SESSION['nome'] ?> </p>
          <li class="nav-item">
            <a href="LOGOUT" class="nav-link">Sair</a>
          </li>
        </div>
      </div>
    </div>
    </div>
  </nav>
  <!-- Navbar -->


  <div class="container d-flex flex-row flex-wrap justify-content-lg-between">
    <div class="anfitriao">
      <p class="info">
      <h2>Meus imóveis</h2>
      <a href="CADASTRARIMOVEL">Cadastrar imóveis</a>
      </p>

      <div class="d-flex flex-wrap">
        <?php if (!empty($imoveis)) { ?>
          <?php for ($i = 0; $i < count($imoveis); $i++) { ?>
            <div class="card text-light" style="background-image: url(View/styles/imagens_carrossel/casa_noite.jpg); background-position: center; background-repeat: no-repeat;">
              <div class="card-body text-center">
                <?php if ($imoveis[$i]->getAnuncio()) { ?>
                  <h3 class="text-warning">Destaque</h3>
                <?php } ?>
                <h3 class="card-title mb-3"><?php echo $imoveis[$i]->getTipo(); ?></h3>
                <h5><i class="fa-solid fa-person"></i><?php echo $imoveis[$i]->getCapacidade(); ?></h5>
                <p class="card-text">
                  <?php echo $imoveis[$i]->getDescricao(); ?>
                </p>
                <form method="post" action="DETALHESANFITRIAO">
                  <input type="hidden" name="idImovel" value="<?php echo $imoveis[$i]->getIdImovel(); ?>">
                  <button type="submit" class="btn btn-primary">Detalhes</button>
                </form>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <h5><?php echo "Sem imóveis cadastrados" ?></h5>
        <?php } ?>

      </div>
    </div>

    <div class="locatario">

      <p class="info">
      <h3>Imóveis que já aluguei</h3>
      <a href="HOME">Explorar outros imóveis</a>
      </p>

      <div class="d-flex flex-wrap">

        <div class="card text-light" style="background-image: url(View/styles/imagens_carrossel/acomodacoes.jpg); background-position: center; background-repeat: no-repeat;">
          <div class="card-body text-center">
            <h3 class="card-title mb-3">Casa</h3>
            <p class="card-text">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Iure, quas quidem possimus dolorum esse eligendi?
            </p>
            <a href="./detalhes_locatario.html" class="btn btn-primary">Detalhes</a>
          </div>
        </div>

        <div class="card text-light" style="background-image: url(View/styles/imagens_carrossel/acomodacoes.jpg); background-position: center; background-repeat: no-repeat;">
          <div class="card-body text-center">
            <h3 class="card-title mb-3">Casa</h3>
            <p class="card-text">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Iure, quas quidem possimus dolorum esse eligendi?
            </p>
            <a href="./detalhes_locatario.html" class="btn btn-primary">Detalhes</a>
          </div>
        </div>

        <div class="card text-light" style="background-image: url(View/styles/imagens_carrossel/acomodacoes.jpg); background-position: center; background-repeat: no-repeat;">
          <div class="card-body text-center">
            <h3 class="card-title mb-3">Casa</h3>
            <p class="card-text">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Iure, quas quidem possimus dolorum esse eligendi?
            </p>
            <a href="./detalhes_locatario.html" class="btn btn-primary">Detalhes</a>
          </div>
        </div>


      </div>

    </div>

  </div>



  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Siga a gente nas redes sociais</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>CoffeHousing
            </h6>
            <p>
              Oferecemos as melhores acomodações pelo melhor preço
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Produtos
            </h6>
            <p>
              <a href="#!" class="text-reset">Casas</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Apartamentos</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Chalés</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Mansões</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Links úteis
            </h6>
            <p>
              <a href="CADASTRARUSUARIO" class="text-reset">Cadastrar</a>
            </p>
            <p>
              <a href="PAGINALOGIN" class="text-reset">Entrar</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contato
            </h6>
            <p><i class="fas fa-home me-3"></i> Bahia , Salvador , Brasil</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              coffehousing@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i>+55 (71) 98643-4681</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2022 Copyright
    </div>

  </footer>
  <!-- Footer -->





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>