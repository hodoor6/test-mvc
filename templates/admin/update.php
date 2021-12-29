<?php $title = "Редактирование продукта";
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$stmt = $pdo->prepare("SELECT 
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
WHERE products.id={$_GET['productId']}");

$stmt->execute();

$productOne = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php"; ?>

    <div class="container">
        <h1>Редактирование продукта</h1>
        <div class="row">

            <form action="/templates/admin/updateHandler.php" method="post">
                <div class="form-group">
                    <label for="exampleInputProduct">Названия продукта</label>
                    <input type="hidden" name="product_id" class="form-control" id="exampleInputName"
                           aria-describedby="nameHelp" placeholder="Заполнить название пропукта" value="<?=$productOne['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputProduct">Названия продукта</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName"
                           aria-describedby="nameHelp" placeholder="Заполнить название пропукта" value="<?= $productOne['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Короткое описание</label>
                    <input type="text" name="description" class="form-control" id="exampleInputDescription"
                           aria-describedby="descriptionHelp" placeholder="Заполнить короткое описание" value="<?= $productOne['description'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Полное описание</label>
                    <input type="text" name="text" class="form-control" id="exampleInputText"
                           aria-describedby="textHelp" placeholder="Заполнить полное описание" value="<?= $productOne['text'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Картинка</label>
                    <input type="text" name="image" class="form-control" id="exampleInputEmail1"
                           aria-describedby="imageHelp" placeholder="прикрепить фото" value="<?= $productOne['image'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Категория</label>
                    <input type="text" name="category_id" class="form-control" id="exampleInputCategory"
                           aria-describedby="emailHelp" placeholder="Выберете категорию" value="<?= $productOne['category_product'] ?>">

                         </div>
                <div class="form-group">
                    <label for="exampleInputUsers">Пользователь</label>
                    <input type="text" name="users" class="form-control" id="exampleInputUsers"
                           aria-describedby="usersHelp" placeholder="Выберите пользователя" value="<?= $productOne['users_product'] ?>">
                </div>
                    <button type="submit" class="btn btn-primary">Изменить продукт</button>
            </form>

        </div>
    </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/footer.php"; ?>