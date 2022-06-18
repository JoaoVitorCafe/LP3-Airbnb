<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="View/styles/login.css">
    <title>Entrar</title>
</head>
<body>
  <div class="overlay">
    <div class="summary">
        <h1>Entrar</h1>
    </div>
    
    <div class="box">
      <form name="login" method="post" action="LOGIN">
          <div class="campo">
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" id="inputPassword" name="senha" placeholder="Password">
            </div>
          </div>    
          <p>Ainda não tem  uma conta?<a href="CADASTRARUSUARIO">Cadastrar</a></p>
            <button type="submit" class="btn btn-success">Entrar</button>
      </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>