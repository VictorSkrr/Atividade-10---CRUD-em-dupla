<?php
include 'config.php';

if (isset($_GET['id_professor'])) {
    $id_professor = $_GET['id_professor'];
    $sql = "DELETE FROM professores WHERE id_professor=$id_professor";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
} elseif (isset($_GET['id_aula'])) {
    $id_aula = $_GET['id_aula'];
    $sql = "DELETE FROM aulas WHERE id_aula=$id_aula";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>
