<?php
require '../config/database.php';

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
    $form = $statement->fetch() ?: $form;
}

$products = $database->query('SELECT * FROM products ORDER BY name')->fetchAll();

require '../templates/header.php';
require '../templates/products.php';
require '../templates/footer.php';
