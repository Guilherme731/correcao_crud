<?php
include("conexao.php");

$id = $_GET["id"];
$stmt = $conn->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$dado = mysqli_fetch_assoc($res);

if (!$dado) {
    die("Usuário não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (empty($nome) || empty($email)) {
        echo "Existem campos não preenchidos!";
    }else{
        $stmt2 = $conn->prepare("UPDATE usuarios SET nome=?, email=? WHERE id=?");
        $stmt2->bind_param("ssi", $nome, $email, $id);
        if ($stmt2->execute()) {
            header("Location: index.php");
        }else{
            echo "Erro ao cadastrar!";
        }
        
    }
    
}
?>

<form method="POST" action="editar.php?id=<?= $id ?>">
    Nome: <input type="text" name="nome" value="<?= $dado['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $dado['email'] ?>"><br>
    <input type="submit" value="Salvar">
</form>