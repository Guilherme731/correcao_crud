<?php
// Conexão com o banco
$host = "localhost";
$user = "root";
$password = "";
$db = "crud_exemplo";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "Falha na conexão!";
}
?>