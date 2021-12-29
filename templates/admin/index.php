<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$stmt = $pdo->prepare(
    "SELECT 
products.id as id, 
products.name as name,
products.description as description, 
products.text as text,
products.image as image,
products.status as status,
categories.name as category_product, 
users.username as users_product
FROM products
INNER JOIN categories ON  products.category_id=categories.id
INNER JOIN users ON products.user_id=users.id
");
$stmt->execute();
$productsAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
$title = "Главная страница Каталога";
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php"; ?>

    <div class="container">
        <p>
        <h1>Главная страница Каталога</h1>  <button><a href="/templates/admin/add.php">Добавить товар</a></button>
        </p>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Полный описание</th>
                        <th scope="col">Картинка</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Редактировать</th>
                        <th scope="col">Удалить</th>
                        <th scope="col">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($productsAll as $product) : ?>
                        <tr>
                            <th scope="row"><?= $product['id'] ?></th>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['description'] ?></td>
                            <td><?= $product['text'] ?></td>
                            <td><img src="/templates/images/<?= $image = (!empty($product['image']))?  $product['image'] : getImage()?>"width="300" height="200"></td>
                            <td><?= $product['category_product'] ?></a>
                            </td>
                            <td><?= $product['users_product'] ?></td>
                            <td><a href="update.php?productId=<?= $product['id'] ?>">Редактировать</a></td>
                            <td><a href="delete.php?deleteId=<?= $product['id'] ?>">Удалить</a></td>
                            <?php if ($product['status'] == 1) : ?>

                                <td>
                                    <a href="status.php?productId=<?= $product['id'] ?>&productStatus=<?= $product['status'] ?>">Скрить</a>
                                </td>
                            <?php else : ?>
                                <td>
                                    <a href="status.php?productId=<?= $product['id'] ?>&productStatus=<?= $product['status'] ?>">Показать</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/footer.php"; ?>