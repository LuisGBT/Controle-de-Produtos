<?php
#Criando a conexão com o banco de dados

#Passando os dados do meu banco
$server = "localhost";
$user = "root";
$pass = "";
$db = "cadastro";

#Executando a conexão 
$conn = new mysqli($server, $user, $pass, $db);

#Fazendo uma verificação que se caso a conexão não execute, retorna uma mensagem de erro
if ($conn === false) {
    echo "ERRO de conexão". mysqli_errno($conn);
    die();
}else
?>