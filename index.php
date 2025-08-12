<?php
include("conexao.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

if ($resultado->num_rows > 0) {
echo "<h1>Lista de Usuários</h1>";
echo "<table border ='1'>
        <tr>
            <th> Nome </th>
            <th> Email </th>
            <th> Ações </th>
        </tr>";

while ($linha = mysqli_fetch_array($resultado)) {
    echo "<tr>
                <td> {$linha['nome']} </td>
                <td> {$linha['email']} </td>
                <td> 
                    <a href='editar.php?id={$linha['id']}'>Editar<a>
                    <a href='excluir.php?id={$linha['id']}'>Excluir<a>
                </td>
        </tr>";
}
echo "</table>";
}
?>
<a href='cadastrar.php'>Cadastrar novo</a>

