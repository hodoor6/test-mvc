<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$productId = htmlspecialchars($_POST['product_id']);
$productName = htmlspecialchars($_POST['name']);
$productDescription = htmlspecialchars($_POST['description']);
$productText = htmlspecialchars($_POST['text']);
$productUsers = htmlspecialchars($_POST['users']);
$productId = htmlspecialchars($_POST['product_id']);

//$productCategory = htmlspecialchars($_POST['category_product']);


$stmt = $pdo->prepare("UPDATE `products`
 SET name='{$productName}',
 description='{$productDescription}',
  text='{$productText}' 
   users='{$productUsers}' 
  WHERE
   id='{$productId}'");


$stmt->execute();

header("Location: /templates/admin/index.php");