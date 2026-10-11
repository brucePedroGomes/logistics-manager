<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database->prepare('INSERT INTO freights (carrier_id, origin_id, destination_id) VALUES (?, ?, ?)')
        ->execute([$_POST['carrier_id'], $_POST['origin_id'], $_POST['destination_id']]);
    $freightId = $database->lastInsertId();

    $addProduct = $database->prepare('INSERT INTO freight_products (freight_id, product_id) VALUES (?, ?)');
    foreach ($_POST['product_ids'] as $productId) {
        $addProduct->execute([$freightId, $productId]);
    }
    header('Location: freights.php?saved=1');
    exit;
}

$carriers = $database->query('SELECT * FROM carriers ORDER BY name')->fetchAll();
$addresses = $database->query('SELECT * FROM addresses ORDER BY address')->fetchAll();
$products = $database->query('SELECT * FROM products ORDER BY name')->fetchAll();

require '../templates/header.php';
require '../templates/freights.php';
require '../templates/footer.php';
