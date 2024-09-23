<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Aulas e Professores</title>
</head>
<body>
    <h1>Adicionar Professor</h1>
    <form action="add_professor.php" method="POST">
        <label for="nome_professor">Nome:</label>
        <input type="text" name="nome_professor" required><br>

        <label for="disciplina">Disciplina:</label>
        <input type="text" name="disciplina" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone"><br>

        <button type="submit">Adicionar Professor</button>
    </form>

    <h1>Adicionar Aula</h1>
    <form action="add_aula.php" method="POST">
        <label for="nome_aula">Nome da Aula:</label>
        <input type="text" name="nome_aula" required><br>

        <label for="data_aula">Data:</label>
        <input type="date" name="data_aula" required><br>

        <label for="horario">Horário:</label>
        <input type="time" name="horario" required><br>

        <button type="submit">Adicionar Aula</button>
    </form>

    <h2>Lista de Professores</h2>
    <?php
    include 'config.php';
    $sql = "SELECT * FROM professores";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Nome</th>
                    <th>Disciplina</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nome_professor'] . "</td>
                    <td>" . $row['disciplina'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['telefone'] . "</td>
                    <td>
                        <a href='edit_professor.php?id_professor=" . $row['id_professor'] . "'>Editar</a> |
                        <a href='delete.php?id_professor=" . $row['id_professor'] . "'>Excluir</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum professor cadastrado.";
    }
    ?>

    <h2>Lista de Aulas</h2>
    <?php
    $sql = "SELECT * FROM aulas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Nome da Aula</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nome_aula'] . "</td>
                    <td>" . $row['data_aula'] . "</td>
                    <td>" . $row['horario'] . "</td>
                    <td>
                        <a href='edit_aula.php?id_aula=" . $row['id_aula'] . "'>Editar</a> |
                        <a href='delete.php?id_aula=" . $row['id_aula'] . "'>Excluir</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma aula cadastrada.";
    }
    ?>

</body>
</html>
