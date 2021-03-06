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
    <link rel="stylesheet" href="View/styles/home.css"/>
</head>
<body>
     <!-- Navbar -->

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
          <?php  if(isset($_SESSION['id'])) { ?>
            <div class="navbar-nav ms-auto">
              <div class="p-2">
                <span class="round">
                  <a href="PERFIL">
                      <img src="<?php echo $_SESSION['id'].'.jpg'; ?>" alt="FotoUsuario" width="50">
                    </a>
                </span>
              </div>
                <p> <?php echo $_SESSION['nome'] ?> </p> 
                <li class="nav-item">
                  <a href="LOGOUT" class="nav-link">Sair</a>
                </li>
            </div>
          </div>
            
          <?php } else {?>
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

     <!-- Navbar -->

      <!-- Carousel -->
    <div class="container mt-20">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img src="View/styles/imagens_carrossel/Icone_Casa_Madeira_Nobre_Europa_Kurten-536x370.jpg " height="400px" width="100" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-light font-weight-bold ">Deixe a curiosidade escolher o seu pr??ximo destino</h3>
            </div>
          </div>

          <div class="carousel-item">
            <img src="View/styles/imagens_carrossel/casa3.jpg" height="400px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-light font-weight-bold ">Todo conforto que voc?? precisa</h3>
            </div>
          </div>
          
          <div class="carousel-item">
            <img src="View/styles/imagens_carrossel/Best-Airbnbs-in-Southern-California-Featured-Image.jpg" height="500" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h3 class="text-light font-weight-bold ">Satisfa??a seu desejo de viajar</h3>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

      <!-- Carousel -->

      <!-- Pesquisa -->
      
      <div class="container">

        <form action="PESQUISAIMOVEL" method="POST" class="d-flex pt-5">

          <div class="campo">
            <span>Cidade</span>
            <input type="text" name="cidade" placeholder="Para onde deseja ir?" required>
          </div>  
        
          <div class="campo">
            <span>In??cio da loca????o</span>
            <input type="date" name="inicio_locacao" required>
          </div> 
          
          <div class="campo">
            <span>Fim da loca????o</span>
            <input type="date" name="fim_locacao" required>
          </div> 

          <div class="campo">
            <span>Quantidade de pessoas</span>
            <input type="number" placeholder="1" name="capacidade" required>
          </div>  

          <select name="tipo" required>
            <option value="1">Quarto</option>
            <option value="2">Apartamento</option>
            <option value="3">Casa</option>
            <option value="4">Fazenda</option>
          </select>  

          <select name="caracteristicas_imovel[]" multiple >
            <option value="1">Cozinha</option>
            <option value="2">Jacuzzi</option>
            <option value="3">Refrigerador</option>
            <option value="4">Camera de seguran??a</option>
            <option value="5">Wifi</option>
            <option value="6">Garagem</option>
            <option value="7">Alarme de inc??ndio</option>
          </select>  

          <button type="submit" style="padding: 1rem; background-color: white; color: black; border: 0;">
          <i class="fas fa-search"></i>
          </button>
        
        </form>
        
      
      </div>

      <!-- Pesquisa -->

      <!-- Acomoda????es -->
      <section class="p-5">
        <div class="container">
          <div class="d-flex flex-wrap">
          <?php if (!empty($imoveis)) {?> 
          <?php foreach ($imoveis as $imovel) {?>
            <div class="card text-light style" style="background-image: url('<?php echo $imovel->getImagem(); ?>');">
                <div class="card-body text-center">
                  <?php if ($imovel->getAnuncio()) {?>
                    <h3 class="text-warning">Destaque</h3>
                  <?php }?>
                <h3 class="card-title mb-3"> <?php echo $imovel->getTipo();?></h3>
                  <p class="card-text">
                    <h5><i class="fa-solid fa-person"></i><?php echo $imovel->getCapacidade();?></h5>
                    <h5 class="font-weight-bold "><?php echo $imovel->getEndereco();?></h5>
                  </p>
                  <form method="post" action="DETALHES">
                      <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel();?>">
                      <button type="submit" class="btn btn-primary">Detalhes</button>
                    </form>
                </div>
              </div>
            <?php }?>
          <?php } else { ?> 
            <h1><?php echo "Sem im??veis para mostrar"?></h1> 
          <?php } ?> 

  

            </div>
        </div>
      </section>
    <!-- Acomoda????es -->

    <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
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
        <i class="fab fa-instagram"></i>
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
            Oferecemos as melhores acomoda????es pelo melhor pre??o
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
            <a href="#!" class="text-reset">Chal??s</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Mans??es</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Links ??teis
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
    ?? 2022 Copyright
  </div>
 
</footer>
<!-- Footer -->
    
  
      


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>