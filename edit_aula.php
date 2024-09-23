<?php
include 'config.php';

$id_aula = $_GET['id_aula'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_aula = $_POST['nome_aula'];
    $data_aula = $_POST['data_aula'];
    $horario = $_POST['horario'];

    $sql = "UPDATE aulas 
            SET nome_aula='$nome_aula', data_aula='$data_aula', horario='$horario' 
            WHERE id_aula=$id_aula";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
} else {
    $sql = "SELECT * FROM aulas WHERE id_aula=$id_aula";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form action="" method="POST">
            <label for="nome_aula">Nome da Aula:</label>
            <input type="text" name="nome_aula" value="<?php echo $row['nome_aula']; ?>" required><br>

            <label for="data_aula">Data:</label>
            <input type="date" name="data_aula" value="<?php echo $row['data_aula']; ?>" required><br>

            <label for="horario">Horário:</label>
            <input type="time" name="horario" value="<?php echo $row['horario']; ?>" required><br>

            <button type="submit">Salvar</button>
        </form>
<?php
    } else {
        echo "Aula não encontrada.";
    }
}
?>
