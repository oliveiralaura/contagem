<?php
require_once('startup/connectBD.php');
include('cadastro/usercadastro.php');

if(isset($_POST['nomeCompleto'], $_POST['matricula'], $_POST['inputPassword6'], $_POST['inputPassword7'])) {
    cadastra($mysqli, $_POST['nomeCompleto'], $_POST['matricula'], $_POST['inputPassword6'], $_POST['inputPassword7']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body id="body-login">
    <main id="main-login">
        <div id="div-login1" >
            <form action="" class="form-login" method="post">
                <h3>Novo cadastro</h3>
                <div class="col-auto">
                    <label for="nomeCompleto" class="col-form-label">Nome completo:</label>
                  </div>
                <input class="form-control" type="text" id="nomeCompleto" aria-label="default input example" name="nomeCompleto">
 
                <div class="col-auto">
                    <label for="matricula" class="col-form-label">Matrícula:</label>
                  </div>
                <input class="form-control" type="number" id="matricula" aria-label="default input example" name="matricula">
               
                <div class="row">
                  <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Senha:</label>
                      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="inputPassword6">
                  </div>
                  <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">Repetir senha:</label>
                      <input type="password" id="inputPassword7" class="form-control" aria-describedby="passwordHelpInline" name="inputPassword7">
                </div>
                </div>
               
                <div class="col-auto">
                    <button type="submit" class="btn btn-success" name="cadastra" id="senha-cadastro">
                      Finalizar cadastro <i class="bi bi-check2-square"></i>
                  </button>
              </div>
               
            </form>
        </div>
    </main>
</body>
</html>
