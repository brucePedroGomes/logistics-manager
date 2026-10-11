<h1>Fretes</h1>

<?php if (isset($_GET['saved'])): ?>
    <div class="alert alert-success">Frete gerado.</div>
<?php endif ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Transportador</label>
        <select name="carrier_id" class="form-select" required>
            <?php foreach ($carriers as $carrier): ?>
                <option value="<?= $carrier['id'] ?>"><?= htmlspecialchars($carrier['name']) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Origem</label>
        <select name="origin_id" class="form-select" required>
            <?php foreach ($addresses as $address): ?>
                <option value="<?= $address['id'] ?>"><?= htmlspecialchars($address['address']) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Destino</label>
        <select name="destination_id" class="form-select" required>
            <?php foreach ($addresses as $address): ?>
                <option value="<?= $address['id'] ?>"><?= htmlspecialchars($address['address']) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Produtos</label>
        <div id="products">
            <select name="product_ids[]" class="form-select mb-2" required>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addProduct()">+ Adicionar produto</button>
    </div>
    <button class="btn btn-primary">Gerar frete</button>
</form>

<h2 class="mt-5">Relatório</h2>
<form action="report.php" class="d-flex gap-2">
    <input type="date" name="date" class="form-control w-auto" required>
    <button class="btn btn-success">Baixar relatório</button>
</form>

<script>
    function addProduct() {
        const products = document.getElementById('products');
        products.append(products.firstElementChild.cloneNode(true));
    }
</script>
