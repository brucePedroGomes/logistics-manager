<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id']) {
        $database->prepare('UPDATE carriers SET name = ? WHERE id = ?')->execute([$_POST['name'], $_POST['id']]);
    } else {
        $database->prepare('INSERT INTO carriers (name) VALUES (?)')->execute([$_POST['name']]);
    }
    header('Location: carriers.php');
    exit;
}

$form = ['id' => '', 'name' => ''];
if (isset($_GET['id'])) {
    $statement = $database->prepare('SELECT * FROM carriers WHERE id = ?');
    $statement->execute([$_GET['id']]);
    $form = $statement->fetch();
}

$carriers = $database->query('SELECT * FROM carriers ORDER BY name')->fetchAll();

require '../templates/header.php';
require '../templates/carriers.php';
require '../templates/footer.php';
