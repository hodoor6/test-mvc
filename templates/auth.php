<?php
if (isset($_REQUEST['auth']) == 'auth') {
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];

    if ($name == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['user'] = 'admin';
        header("Location: /index.php");
        exit();
    } elseif ($name !== 'admin') {
        $viewErrors = "Вы вели неправильный логин - " . $name;
    } elseif ($password !== 'admin') {
        $viewErrors = "Вы вели неправильный пароль";
    } else {
        $errorMassage = "Логин или пароль неверны";
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/templates/css/auth.css">
    <title>Авторизация</title>
</head>
<body class="text-center">

<form class="form-signin" action="" method="post">
    <img class="mb-4" src="images/apple-touch-icon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    <?php
    if (!empty($viewErrors)) { ?>
        <div class="alert alert-danger">
            <?php
            echo $viewErrors ?>
        </div>
        <?php
    } ?>
    <?php
    if (!empty($errorMassage)) { ?>
        <div class="alert alert-info">
            <?php
            echo $errorMassage ?>
        </div>
        <?php
    } ?>
    <div class="form-group">
        <input class="form-control" type="text" required="required" minlength="5" id="name" placeholder="Логин"
               name="name" value="<?= isset($name) ?>">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" required="required" minlength="5" id="password" placeholder="Пароль"
               name="password">
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="auth" value="auth">
    </div>
    <button type="submit" class="btn btn-lg btn-primary btn-block">Войти</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
</body>
</html>