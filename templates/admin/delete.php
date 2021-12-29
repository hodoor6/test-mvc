<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$productDeleleId = htmlspecialchars($_GET['deleteId']);


$stmt = $pdo->prepare("
SELECT image FROM `products` WHERE `id`='{$productDeleleId}'
");


$stmt->execute();

$deleteImage = $stmt->fetchColumn();
$img = '../images/' . $deleteImage;

if(!empty($deleteImage)){
    delete($img);
}

$stmt = $pdo->prepare("
DELETE `products` as a1,`reviews` as a2
FROM `products`
INNER JOIN `reviews` WHERE `a1`.product_id='{$productDeleleId}' AND `a2`.id='{$productDeleleId}' 
");
//$stmt = $pdo->prepare("
//DELETE `products`,`reviews`
//FROM `products`
//LEFT JOIN `reviews` ON reviews.product_id=products.id
//WHERE `reviews`.product_id='{$productDeleleId}' AND `products`.id='{$productDeleleId}'
//");


DELETE products,reviews FROM products INNER JOIN reviews WHERE reviews.product_id=3 AND `products.id = 3 or

https://dev.mysql.com/doc/refman/8.0/en/delete.html

https://overcoder.net/q/661130/mysql-%D1%83%D0%B4%D0%B0%D0%BB%D0%B8%D1%82%D1%8C-%D0%B7%D0%B0%D0%BF%D0%B8%D1%81%D0%B8-%D0%B8%D0%B7-2-%D1%82%D0%B0%D0%B1%D0%BB%D0%B8%D1%86
$stmt->execute();

header("Location: /templates/admin/index.php");
