<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/templates/images/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Админ панель
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="/">Фильмы<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Режиссеры</a>
            </li>
        </ul>

        <ul class="navbar-nav">

            <?php
            if (!isset($_SESSION['user'])): ?>
                <?php
                header("Location: /auth.php");
                exit();
                ?>
            <?php
            else: ?>
                <li class="nav-item">
                </li>
                <li class="nav-item nav-link">Пользователь - <?php
                    echo $_SESSION['user'] ?></li>
                <a href="logout.php" class="btn btn-danger">Выход</a>
                </li>

            <?
            endif; ?>
        </ul>
    </div>
</nav>


