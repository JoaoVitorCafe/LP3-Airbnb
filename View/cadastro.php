<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/cadastro.css">
    <title>Entrar</title>
</head>
<body>
  <div class="overlay">
    
    <div class="summary">
      <h1>Cadastre-se de graça</h1>
      <h2>Crie uma nova conta</h2>
      <p>Já tem uma conta?<a href="./login.html">Entrar</a></p>
    </div>
    
    <div class="box">
      
      <form>
        <div class="form-group">
          <label for="inputPassword">Nome completo</label>
          <input type="password" class="form-control" id="inputPassword" placeholder="Senha" name="nome">
        </div>
          <div class="campo" style="display: flex;">
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="senha">
            </div>
          </div>    
          <div class="form-group">
            <label for="inputTelefone">Telefone</label>
            <input type="number" class="form-control" id="inputTelefone" placeholder="Telefone" name="telefone">
          </div>
          <div class="form-group">
              <label for="inputPais">País</label>
              <input type="text" class="form-control" id="inputPais" placeholder="Brasil" name="pais">
            </div>
            <div class="campo">
              <div class="form-group">
                <label for="inputState">Estado</label>
                <input type="text" class="form-control" id="inputState" name="inputState" placeholder="Bahia" name="estado">
              </div>
              <div class="form-group">
                <label for="inputCity">Cidade</label>
                <input type="text" class="form-control" id="inputCity" placeholder="Salvador" name="cidade">
              </div>
            </div>         
                <button type="submit" class="btn btn-success">
                  <a class="text-white" href="./perfil.html">Criar conta</a>
              </button>
          </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>