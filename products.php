<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id']) {
        $database->prepare('UPDATE products SET name = ? WHERE id = ?')->execute([$_POST['name'], $_POST['id']]);
    } else {
        $database->prepare('INSERT INTO products (name) VALUES (?)')->execute([$_POST['name']]);
    }
    header('Location: products.php');
    exit;
}

$form = ['id' => '', 'name' => ''];
if (isset($_GET['id'])) {
    $statement = $database->prepare('SELECT * FROM products WHERE id = ?');
    $statement->execute([$_GET['id']]);
    $form = $statement->fetch();
}

$products = $database->query('SELECT * FROM products ORDER BY name')->fetchAll();

require 'includes/header.php';
?>
<h1>Produtos</h1>

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
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><a href="products.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-secondary">Editar</a></td>
        </tr>
    <?php endforeach ?>
</table>
</main>
</body>
</html>
