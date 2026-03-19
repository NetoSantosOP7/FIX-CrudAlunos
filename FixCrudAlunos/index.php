<?php

require __DIR__ . '/conexao.php';
require __DIR__ . '/listar.php';
require __DIR__ . '/salvar.php';


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Alunos</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="card mb-4" style="max-width:600px">
        <div class="card-header"><strong>Novo Aluno</strong></div>
        <div class="card-body">
            <form method="post">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Matrícula</label>
                        <input type="text" name="matricula" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div>
    </div>



    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Status</th>
        </tr>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td class="id_usuario"><?= htmlspecialchars($aluno['id']) ?></td>
                <td class="nome_usuario"><?= htmlspecialchars($aluno['nome']) ?></td>
                <td class="matricula_usuario"><?= htmlspecialchars($aluno['matricula']) ?></td>
                <td class="email_usuario"><?= htmlspecialchars($aluno['email']) ?></td>
                <td class="data_nascimento_usuario"><?= htmlspecialchars($aluno['data_nascimento']) ?></td>
                <td class="status_usuario"><?= htmlspecialchars($aluno['status']) ?></td>

                <td>
                    <a class="btn btn-primary text-white" href="edit.php?id=<?= $aluno['id'] ?>">Editar</a>
                </td>
                <td>
                    <form method="post" action="delete.php"
                        onsubmit="return confirm('Apagar <?= htmlspecialchars($aluno['nome']) ?>?')">
                        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>