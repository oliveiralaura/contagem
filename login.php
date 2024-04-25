<?php
include('cadastro/usercadastro.php');
if(isset($_POST['login-submit'])) {
    verificaLogin($mysqli);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body id="body-login">
    <main id="main-login">
        <div id="div-loginn" class="primeiro">
            <img src="images/logo.png" alt="" id="image-login" width="50px" height="50px">
                <p> Sistema de gestão do almoço</p><br>
                <p></p>
                <form action="cadastro.php" class="form-login">
                    <input class="btn btn-warning" id="cadastro-login" type="submit" value="Cadastre-se">                
                </form>
        </div>
        <div id="div-login" class="segundo">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-login" method="post">
                <h3>Login</h3>
                <div class="col-auto">
                    <label for="matricula-login" class="col-form-label">Matrícula:</label>
                  </div>
                <input class="form-control" type="text" id="matricula-login" aria-label="default input example" name="matricula-login">
                <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">Senha:</label>
                    </div>
                    <div class="col-auto">
                      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="inputPassword6">
                  </div>
                  <div class="col-auto">
                    <input class="btn btn-success" type="submit" value="Entrar" id="senha-login" name="login-submit">
                </div>
                
            </form>
            <a href="admin/loginadmin.php"><input class="btn btn-danger" type="submit" value="Entrar como admin" id="entra-admin" name="entra-admin"></a>

        </div>
    </main>
</body>
</html>
