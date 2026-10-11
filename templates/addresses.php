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
