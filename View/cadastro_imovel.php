<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="View/styles/cadastro_imovel.css">
    <title>Entrar</title>
</head>
<body>  
    <div class="overlay">
    <form name="form-imovel" class="d-flex flex-wrap justify-content-around align-items-center" style="text-align: center;" method="POST" action="NOVOIMOVEL" enctype="multipart/form-data">
        
        <div class="box">
        <h1>Dados do cartão de crédito</h1>  
        <div class="campo" style="display: flex;">
            <div class="form-group">
              <label for="name">Nome completo</label>
              <input type="text" class="form-control" id="name" name="titular" placeholder="Titular do cartão" maxlength="45"required>
            </div>
            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11"required>
            </div>
          </div>    
          <div class="form-group">
            <label for="numero_cartao">Numero do cartão</label>
            <input type="number" class="form-control" placeholder="1234 1234 1234 1234" name="numero_cartao" maxlength="45" required>
          </div>
          <div class="form-group">
            <label for="codigo_seguranca">CVV</label>
            <input type="number" class="form-control" id="codigo_seguranca" name="codigo_seguranca" placeholder="699" maxlength="3" required>
          </div>
          <div class="form-group">
              <label for="validade_cartao">Data de validade</label>
              <input type="date" class="form-control" id="validade_cartao" name="validade_cartao" required>
          </div>
        </div>

        <div class="box">
            <h1>Dados do imóvel</h1>

            <div class="campo d-flex">
              <div class="form-group">
                <label for="cep">CEP</label>
                <input type="number" class="form-control" id="cep" name="cep" maxlength="8" required>
              </div>
              <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" class="form-control"  id="rua" name="rua" maxlength="45" required>
              </div>
            </div>
            
            <div class="campo d-flex">
              <div class="form-group">
                <label for="numero">Numero</label>
                <input type="number" class="form-control" name="numero" id="numero" maxlength="7" required>
              </div>
              <div class="form-group">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais"required maxlength="45">
              </div>
            </div>

            <div class="campo d-flex">
              <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" maxlength="45" required>
              </div>
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade"maxlength="45" required>
              </div>
            </div>  

            <div class="campo d-flex">

              <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" maxlength="100">
              </div>
              
              <div class="form-group">
                <label for="capacidade_pessoas">Capacidade máxima de pessoas</label>
                <input type="number" class="form-control" id="capacidade_pessoas" name="capacidade_pessoas" maxlength="8" required>
              </div>
              
            </div>

            <div class="campo d-flex justify-content-between">
              
              <div class="form-group">
                <label for="imagem">Imagem do imovel</label>
                <input type="file" class="form-control" id="inputImagem" name="imagem" required>
              </div>
              
              <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" cols="30" rows="3" class="form-control"maxlength="100" required></textarea>
              </div>
            </div>
            
            
            <div class="campo d-flex justify-content-around">                   
              <select name="tipo_imovel" id="tipo">
                <option value="1" selected>Quarto</option>
                <option value="2">Apartamento</option>
                <option value="3">Casa</option>
                <option value="4">Fazenda</option>
              </select>  
              
              <select name="caracteristicas_imovel[]" id="caracteristicas" multiple size = 7>
                <option selected value="1">Cozinha</option>
                <option value="2">Jacuzzi</option>
                <option value="3">Refrigerador</option>
                <option value="4">Camera de segurança</option>
                <option value="5">Wifi</option>
                <option value="6">Garagem</option>
                <option value="7">Alarme de incêndio</option>
              </select>  
            </div>
            
              <div class="form-group">
                <label for="preco_locacao">Preço da diária</label>
                <input type="numero" class="form-control" id="preco_locacao" name="preco_locacao" placeholder="R$1000,00" maxlength="7" required>
              </div>

          </div>

            <button type="submit" class="btn btn-success">
                Cadastrar imóvel
            </button>
            
        </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>