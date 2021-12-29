<?php $title = "Добавление продукта";
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

if (isset($_POST['submit'])) {
    $uploaddir = '../images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $productImage = basename($_FILES['image']['name']);
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    $productName = htmlspecialchars($_POST['name']);
    $productDescription = htmlspecialchars($_POST['description']);
    $productText = htmlspecialchars($_POST['text']);
    $productUsers = htmlspecialchars($_POST['users']);
    $productCategory = htmlspecialchars($_POST['category']);

    $stmt = $pdo->prepare("INSERT INTO `products`
 SET name='{$productName}',
 description='{$productDescription}',
  text='{$productText}' ,
   user_id='{$productUsers}',
    category_id='{$productCategory}',   
    image='{$productImage}'   
 ");

    $stmt->execute();

    header("Location: /templates/admin/index.php");
}


$stmt = $pdo->prepare("SELECT * FROM `categories` WHERE id >0 ");

$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM `users`  WHERE id >0 ");

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php"; ?>

    <div class="container">
        <h1>Добавить продукт</h1>
        <div class="row">

            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="exampleInputProduct">Названия продукта</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName"
                           aria-describedby="nameHelp" placeholder="Заполнить название пропукта"
                           value="<?= isset($productName) ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Короткое описание</label>
                    <input type="text" name="description" class="form-control" id="exampleInputDescription"
                           aria-describedby="descriptionHelp" placeholder="Заполнить короткое описание"
                           value="<?= $productOne['description'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Полное описание</label>
                    <input type="text" name="text" class="form-control" id="exampleInputText"
                           aria-describedby="textHelp" placeholder="Заполнить полное описание"
                           value="<?= $productOne['text'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Картинка</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                           aria-describedby="imageHelp" placeholder="прикрепить фото"
                           required>
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Категория</label>

                    <select name="category" required>
                        <option selected disabled>Выберите категорию</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsers">Пользователь</label>
                    <select name="users" required>
                        <option selected disabled>Выберите пользователя</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Добавить продукт</button>
                </div>
            </form>

        </div>
    </div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/footer.php"; ?>