<?php
include 'config.php';

$id_professor = $_GET['id_professor'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_professor = $_POST['nome_professor'];
    $disciplina = $_POST['disciplina'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE professores 
            SET nome_professor='$nome_professor', disciplina='$disciplina', email='$email', telefone='$telefone' 
            WHERE id_professor=$id_professor";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
} else {
    $sql = "SELECT * FROM professores WHERE id_professor=$id_professor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form action="" method="POST">
            <label for="nome_professor">Nome:</label>
            <input type="text" name="nome_professor" value="<?php echo $row['nome_professor']; ?>" required><br>

            <label for="disciplina">Disciplina:</label>
            <input type="text" name="disciplina" value="<?php echo $row['disciplina']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"><br>

            <button type="submit">Salvar</button>
        </form>
<?php
    } else {
        echo "Professor não encontrado.";
    }
}
?>
