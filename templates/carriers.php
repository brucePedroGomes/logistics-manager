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
