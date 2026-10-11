<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id']) {
        $database->prepare('UPDATE carriers SET name = ? WHERE id = ?')->execute([$_POST['name'], $_POST['id']]);
    } else {
        $database->prepare('INSERT INTO carriers (name) VALUES (?)')->execute([$_POST['name']]);
    }
    header('Location: carriers.php');
    exit;
}

$form = ['id' => '', 'name' => ''];
if (isset($_GET['id'])) {
    $statement = $database->prepare('SELECT * FROM carriers WHERE id = ?');
    $statement->execute([$_GET['id']]);
    $form = $statement->fetch();
}

$carriers = $database->query('SELECT * FROM carriers ORDER BY name')->fetchAll();

require 'includes/header.php';
?>
<h1>Transportadores</h1>

<form method="post" class="mb-4">
    <input type="hidden" name="id" value="<?= $form['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input name="name" class="form-control" value="<?= htmlspecialchars($form['name']) ?>" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<table class="table">
    <tr><th>ID</th><th>Nome</th><th></th></tr>
    <?php foreach ($carriers as $carrier): ?>
        <tr>
            <td><?= $carrier['id'] ?></td>
            <td><?= htmlspecialchars($carrier['name']) ?></td>
            <td><a href="carriers.php?id=<?= $carrier['id'] ?>" class="btn btn-sm btn-secondary">Editar</a></td>
        </tr>
    <?php endforeach ?>
</table>
</main>
</body>
</html>
