<?php

require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $matricula = $_POST["matricula"];
    $data_nascimento = $_POST["data_nascimento"];

    $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, email = ?, matricula = ?, data_nascimento = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $matricula, $data_nascimento, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET["id"] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt =$pdo->prepare('SELECT * FROM alunos WHERE id = ?');
$stmt->execute([$id]);
$aluno = $stmt->fetch();

if(!$aluno) {
    header('Location: index.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Editar Aluno</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <form method="post">

            <input type="hidden" name="id" value="<?= htmlspecialchars($aluno['id']) ?>">

            <div>
                <label>
                    Nome
                </label>

                <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($aluno['nome']) ?>" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($aluno['email']) ?>" required>
            </div>

            <div>
                <label>Matrícula</label>
                <input type="text" name="matricula" value="<?= htmlspecialchars($aluno['matricula']) ?>" required>
            </div>

            <div>
                <label>Data de Nascimento</label>
                <input type="date" name="data_nascimento" value="<?= htmlspecialchars($aluno['data_nascimento']) ?>" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
            </div>

        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>