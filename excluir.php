<?php
include("conexao.php");

$id = $_GET["id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<p>Tem certeza?</p>
<form method="POST" action="">
    <button type="submit">Excluir</button>
    <a href="index.php">Cancelar</a>
</form>