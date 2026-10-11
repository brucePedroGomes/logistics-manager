<?php
$database = new PDO('mysql:host=localhost;dbname=logistics_manager;charset=utf8mb4', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
