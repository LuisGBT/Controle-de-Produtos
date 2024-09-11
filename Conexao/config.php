<?php
#Criando a conexão com o banco de dados
$server = "localhost";
$user = "root";
$pass = "";
$db = "cadastro";

$conn = new mysqli($server, $user, $pass, $db);

    if ($conn === false) {
        echo "ERRO de conexão". mysqli_errno($conn);
        die();
    }else

    

?>