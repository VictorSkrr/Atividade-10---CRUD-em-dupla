<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_aula = $_POST['nome_aula'];
    $data_aula = $_POST['data_aula'];
    $horario = $_POST['horario'];

    $sql = "INSERT INTO aulas (nome_aula, data_aula, horario) 
            VALUES ('$nome_aula', '$data_aula', '$horario')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
