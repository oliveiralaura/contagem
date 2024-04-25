<?php

require_once('startup/connectBD.php');



function quantidade($mysqli, $data, $turma, $numero, $pessoa){
    if(!empty($data) && !empty($turma) && !empty($numero) && !empty($pessoa)){

            $query = "INSERT INTO qtd_alunos (id_qtd_aluno, total_qtd_aluno, data_qtd_aluno, turmas_id_turma, usuarios_id_usuario) VALUES (null, '$numero', '$data', '$turma', '$pessoa')";

            if($mysqli->query($query)) {
                echo "Registro inserido com sucesso!<br>";
            } else {
                echo "Erro ao inserir registro: " . $mysqli->error;
            }
        
    }
}


?>