<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id']) {
        $database->prepare('UPDATE addresses SET address = ? WHERE id = ?')->execute([$_POST['address'], $_POST['id']]);
    } else {
        $database->prepare('INSERT INTO addresses (address) VALUES (?)')->execute([$_POST['address']]);
    }
    header('Location: addresses.php');
    exit;
}

$form = ['id' => '', 'address' => ''];
if (isset($_GET['id'])) {
    $statement = $database->prepare('SELECT * FROM addresses WHERE id = ?');
    $statement->execute([$_GET['id']]);
    $form = $statement->fetch();
}

$addresses = $database->query('SELECT * FROM addresses ORDER BY address')->fetchAll();

require 'includes/header.php';
?>
<h1>Endereços</h1>

<form method="post" class="mb-4">
    <input type="hidden" name="id" value="<?= $form['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Endereço</label>
        <input name="address" class="form-control" value="<?= htmlspecialchars($form['address']) ?>" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
</form>

<table class="table">
    <tr><th>ID</th><th>Endereço</th><th></th></tr>
    <?php foreach ($addresses as $address): ?>
        <tr>
            <td><?= $address['id'] ?></td>
            <td><?= htmlspecialchars($address['address']) ?></td>
            <td><a href="addresses.php?id=<?= $address['id'] ?>" class="btn btn-sm btn-secondary">Editar</a></td>
        </tr>
    <?php endforeach ?>
</table>
</main>
</body>
</html>
