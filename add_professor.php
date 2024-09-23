<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_professor = $_POST['nome_professor'];
    $disciplina = $_POST['disciplina'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO professores (nome_professor, disciplina, email, telefone) 
            VALUES ('$nome_professor', '$disciplina', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
