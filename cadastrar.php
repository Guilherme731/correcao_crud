<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (empty($nome) || empty($email)) {
        echo "Existem campos não preenchidos!";
    }else{
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $email);
        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        }else{
            echo "Erro ao cadastrar!";
        }
    }
}

?>

<form method="POST" action="cadastrar.php">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Cadastrar</button>
</form>
<a href="index.php">Voltar</a>