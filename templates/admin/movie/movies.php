<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

?>
<?php
$title = "Список фильмов"; ?>
<!--Connecting header-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/header.php"; ?>
<!--Connecting User menu-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/user-menu.php" ?>
<div class="container-fluid h-100">
    <hr>
    <div class="row justify-content-center align-items-center">
        <h1>Список фильмов</h1>
        &nbsp;
        <div>
            <form  action='/templates/admin/movie/addMovie.php' method='post'>
                <button class="btn btn-success" type="submit" name="addMovie"
                        value="Добавить">
                    Добавить
                </button>
            </form>
        </div>
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
                    $i = 1;
                    foreach ($movies as $movie): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $movie->name ?></td>
                            <td style="width:25%"><?= $movie->description ?></td>
                            <td><?= date("d.m.Y", strtotime($movie->releaseDate)) ?></td>
                                      <td><?= $movie->director_name ?></td>
                            <td><a class="btn btn-warning"
                                   href="/templates/admin/movie/editMovie.php?movieId=<?= $movie->movieId ?>"
                                   role="button">Редактировать</a>
                            </td>
                            <td><a class="btn btn-danger"
                                   href="/templates/admin/movie/deleteMovie.php?deleteMovieId=<?= $movie->movieId ?>">Удалить</a>
                            </td>
                            <td>
                                <form  action='/templates/admin/movie/addMovie.php' method='post'>
                                    <button class="btn btn-success" type="submit" name="addMovie"
                                            value="Добавить">
                                        Добавить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Connecting footer-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/footer.php"; ?>
