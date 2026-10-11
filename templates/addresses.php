<h1>Endereços</h1>

<form method="post" class="mb-4">
    <input type="hidden" name="id" value="<?= $form['id'] ?>">
    <div class="mb-3">
        <label class="form-label">CEP</label>
        <input class="form-control" oninput="fillAddress(this.value)">
    </div>
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

<script>
    async function fillAddress(cep) {
        const digits = cep.replace(/\D/g, '');
        if (digits.length !== 8) return;
        const response = await fetch(`https://viacep.com.br/ws/${digits}/json/`);
        const address = await response.json();
        if (address.erro) return alert('CEP não encontrado');
        const parts = [address.logradouro, address.bairro, `${address.localidade}/${address.uf}`, address.cep];
        document.querySelector('[name=address]').value = parts.filter(Boolean).join(', ');
    }
</script>
