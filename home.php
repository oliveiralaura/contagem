<?php
   
   session_start();
    require_once('startup/connectBD.php');
    
    include('cadastro/quantidade.php');
    include('cadastro/usercadastro.php');
    

    if(isset($_POST['data'], $_POST['turma'], $_POST['numero'], $_POST['pessoa'])) {
        quantidade($mysqli, $_POST['data'], $_POST['turma'], $_POST['numero'], $_POST['pessoa']);
    }
    
        
    if (!isset($_SESSION['matricula'])) {
        header("Location: login.php");
        exit();
    }

    $nome_usuario = $_SESSION['nome_usuario'];
    $sql = "SELECT * FROM usuarios";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            $dados [] = array(
            'id' => $user['id_usuario'],
            'nome' => $user['nome_usuario'],
             );
        };
    }else{
        echo 'Nenhum user';
        exit;
    };

    $sql_turmas = "SELECT * FROM turmas";
    $result_turmas = $mysqli->query($sql_turmas);

    if (mysqli_num_rows($result_turmas) > 0) {
        while ($turma = mysqli_fetch_array($result_turmas)) {
            $dados_turmas[] = array(
                'id_t' => $turma['id_turma'],
                'nome_t' => $turma['nome_turma']
            );
        }
    } else {
        echo 'Nenhum registro de turmas';
        exit;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>
<body id="body-home">
    <main class="main-home" id="main-home">  
        <nav id="nav-home">
            <img src="images/logo.png" alt="logo" class="img-home"><h3>Controle de Almoço </h3>
            <form action="logout.php" method="post" id="form-logout">
                <input type="hidden" name="logout" value="true">
                <a href="#" onclick="document.getElementById('form-logout').submit();">Sair</a>
            </form>


        </nav>
        <div id="div-home">
        <p>Bem vindo, <?php echo $nome_usuario; ?> </p>
            <p>
                <?php
                setlocale(LC_ALL, 'pt_BR');
                echo strftime('%e de %B de %Y');
                ?>
            </p>
        </div>

        <div id="div-form" >
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form-home">
    <h3>Preencha os campos abaixo:</h3>
    <div class="col-auto">
        <label for="data" class="col-form-label">Data:</label>
    </div>
    <input class="form-control" type="date" id="data" aria-label="default input example" name="data">
    <div class="col-auto">
        <label for="turma" class="col-form-label">Turma:</label>
    </div>
    <select class="form-select" aria-label="Default select example" id="turma" name="turma">
        <option selected>Selecione uma turma</option>
        <?php
            foreach($dados_turmas as $turma){
                echo '<option value="' . $turma['id_t'] . '">' . $turma['nome_t'] . '</option>';
            }
            ?>
    </select>
    <div class="col-auto">
        <label for="numero" class="col-form-label">Quantidade de alunos</label>
    </div>
    <div class="col-auto">
        <input type="number" id="numero" class="form-control" aria-describedby="passwordHelpInline" name="numero">
    </div>
    <div class="col-auto">
        <label for="pessoa" class="col-form-label">Usuário</label>
    </div>
    <div class="col-auto">
        <select name="pessoa" id="pessoa" class="form-control">
            <option value="">Escolha uma opção</option>
            <?php
            foreach($dados as $usuario){
                echo '<option value="' . $usuario['id'] . '">' . $usuario['nome'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-auto">
        <input class="btn btn-warning" type="submit" value="Enviar" id="enviar-home">
    </div>
</form>

        </div>
    </main>
    <footer></footer>
</body>
</html>