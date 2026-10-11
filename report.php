<?php
require 'includes/database.php';

$statement = $database->prepare(
    'SELECT freights.id,
            carriers.name AS carrier,
            origins.address AS origin,
            destinations.address AS destination,
            GROUP_CONCAT(products.name SEPARATOR ", ") AS products
     FROM freights
     JOIN carriers ON carriers.id = freights.carrier_id
     JOIN addresses AS origins ON origins.id = freights.origin_id
     JOIN addresses AS destinations ON destinations.id = freights.destination_id
     JOIN freight_products ON freight_products.freight_id = freights.id
     JOIN products ON products.id = freight_products.product_id
     WHERE DATE(freights.created_at) = ?
     GROUP BY freights.id'
);
$statement->execute([$_GET['date']]);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="relatorio-fretes-' . $_GET['date'] . '.csv"');

$csv = fopen('php://output', 'w');
$utf8Bom = "\u{FEFF}";
fwrite($csv, $utf8Bom);
fputcsv($csv, ['Frete', 'Transportador', 'Origem', 'Destino', 'Produtos'], ';');
foreach ($statement as $freight) {
    fputcsv($csv, $freight, ';');
}
