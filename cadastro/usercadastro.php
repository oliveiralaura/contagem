<?php

require_once('startup/connectBD.php');


function cadastra($mysqli, $nome, $matricula, $senha, $senha_repetida){
    if(!empty($nome) && !empty($matricula) && !empty($senha) && !empty($senha_repetida)){

        if ($senha === $senha_repetida) {
            // $senha_hash = sha1($senha);
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT INTO usuarios (id_usuario, nome_usuario, matricula_usuario, senha_usuario) VALUES (null, '$nome', '$matricula', '$senha_hash')";

            if($mysqli->query($query)) {
                header("Location: login.php");
            } else {
                echo "Erro ao inserir registro: " . $mysqli->error;
            }
        } else {
            echo "As senhas não coincidem!";
        }
    }
}

function verificaLogin($mysqli){
    if(isset($_POST['matricula-login']) && isset($_POST['inputPassword6'])) {
        $matricula = $_POST['matricula-login'];
        $senha = $_POST['inputPassword6'];

        $query = "SELECT * FROM usuarios WHERE matricula_usuario='$matricula'";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome_usuario = $row['nome_usuario'];
            $senha_hash = $row['senha_usuario'];

            if (password_verify($senha, $senha_hash)) {
                // A senha é válida
                session_start();
                $_SESSION['matricula'] = $matricula;
                $_SESSION['nome_usuario'] = $nome_usuario;


                header("Location: home.php?login=success");
                
                exit(); 
            } else {
                // A senha é inválida
                echo "Matrícula ou senha incorretas.";
            }
        } else {
            echo "Matrícula não encontrada.";
        }
    }
}

?>