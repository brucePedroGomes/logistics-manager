<?php
require '../config/database.php';

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
    $form = $statement->fetch() ?: $form;
}

$addresses = $database->query('SELECT * FROM addresses ORDER BY address')->fetchAll();

require '../templates/header.php';
require '../templates/addresses.php';
require '../templates/footer.php';
