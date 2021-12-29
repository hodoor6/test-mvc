<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$productId = htmlspecialchars($_GET['productId']);
$productStatus = htmlspecialchars($_GET['productStatus']);

if ($productStatus == 1) {
    $productStatus = 0;
} else {
    $productStatus = 1;
}

$stmt = $pdo->prepare("UPDATE `products`
 SET status='{$productStatus}'
  WHERE id='{$productId}'");

$stmt->execute();

header("Location: /templates/admin/index.php");