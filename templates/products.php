<h1>Produtos</h1>

<form method="post" class="mb-4">
    <input type="hidden" name="id" value="<?= $form['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <div id="products">
            <input name="names[]" class="form-control mb-2" value="<?= htmlspecialchars($form['name']) ?>" required>
        </div>
        <?php if (!$form['id']): ?>
            <button type="button" class="btn btn-secondary" onclick="addProduct()">+ Adicionar produto</button>
        <?php endif ?>
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

<script>
    function addProduct() {
        const products = document.getElementById('products');
        const product = products.firstElementChild.cloneNode();
        product.value = '';
        products.append(product);
    }
</script>
