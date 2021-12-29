<?php

require_once $_SERVER['DOCUMENT_ROOT']  . "/core/connection.php";

?>
<?php $title = "Список фильмов"; ?>
<!--Connecting header-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php"; ?>
<!--Connecting User menu-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/user-menu.php" ?>
<div class="container-fluid h-100">
    <hr>
    <div class="row justify-content-center align-items-center">
        <h1>Список фильмов</h1>
    </div>
    <hr>
    <div class="container-fluid h-100 pr-3 pl-3">
        <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название фильма</th>
                    <th scope="col">Описание фильма</th>
                    <th scope="col">Дата выхода</th>
                    <th scope="col">Режиссёр</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                    <th scope="col">Добавить</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($movies as $movie): ?>
                    <tr>
                        <th scope="row"><?= $movie->movieId ?></th>
                        <td><?= $movie->name ?></td>
                        <td style="width:25%"><?= $movie->description ?></td>
                        <td><?= date("d.m.Y", strtotime($movie->releaseDate)) ?></td>
                        <?php
                        foreach ($directors as $director) :
                            if ($movie->directorId === $director->directorId) : ?>
                                <td><?= $director->name ?></td>
                            <?php
                            endif;
                        endforeach; ?>
                        <td><a class="btn btn-warning" href="editMovie.php?movieId=<?= $movie->movieId ?>"
                               role="button">Редактировать</a>
                        </td>
                        <td><a class="btn btn-danger" href="delete.php?movieId=<?= $movie->movieId ?> role="
                               button">Удалить</a></td>
                        <td><a class="btn btn-success" href="addMovie.php" role=" button">Добавить</a></td>
                    </tr>
                <?php
                endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>

</body>
</html>