
<?php
$mysqli = new mysqli("localhost", "root", "", "contagem");

if($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$result = $mysqli->query("SELECT * FROM cardapios");




?>
