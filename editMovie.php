<?php

include($_SERVER['DOCUMENT_ROOT'] . '/core/connection.php');
include($_SERVER['DOCUMENT_ROOT'] . '/model/directors.php');

//include($_SERVER['DOCUMENT_ROOT'] . '/model/movies.php');

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

    <title>Редактирование фильма</title>
</head>
<body class="bg-light">
<div class="container-fluid h-100  pt-3">
    <div class="row justify-content-center align-items-center">
        <h2>Редактирование фильма</h2>
    </div>
    <hr/>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="model/movies.php" METHOD="POST">
                                <input type="hidden" name="updateMovieId" value="<?
                                if (!empty($_GET['movieId'])) {
                                    echo $_GET['movieId'];
                                }
                                ?>">
                                <?
                                foreach (
                                    $movies
                                    as $movie
                                ): ?>
                                    <?
                                    if ($movie->movieId == $_GET['movieId']) : ?>

                                        <div class="form-group">
                                            <label>Названия фильма</label>
                                            <input class="form-control" type="text" required="required" minlength="3"
                                                   maxlength="50" name="movieName"
                                                   placeholder="Названия фильма"
                                                   value="<?= $movie->name ?>">
                                            <small class="form-text text-muted">Напишите название фильма от 3 символов
                                                до 50 симфолов</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Описание фильма</label>
                                            <textarea class="form-control" required="required" minlength="3"
                                                      maxlength="5000" cols="25" rows="4"
                                                      placeholder="Описание фильма"
                                                      name="movieDescription"><?= $movie->description ?></textarea>
                                            <small class="form-text text-muted">Напишите описание к фильму от 3 символов
                                                до 5000 символов</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Дата выхода</label>
                                            <input class="form-control" type="date" required="required" minlength="10"
                                                   name="movieReleaseDate"
                                                   value="<?= $movie->releaseDate ?>">
                                            <small class="form-text text-muted">Виберете дату выхода фильма</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Режиссер</label>
                                            <select class="form-control" name="movieDirectorId"
                                                    placeholder="Выберите режиссера">
                                                <?php
                                                foreach ($directors as $director) :
                                                    if ($movie->directorId === $director->directorId) : ?>
                                                        <option disabled="disabled">Выбранный Режиссер
                                                            - <?= $director->name ?></option>
                                                    <?php
                                                    endif;
                                                endforeach;
                                                foreach (
                                                    $directors
                                                    as $director
                                                ): ?>

                                                    <?
                                                    if ($movie->directorId === $director->directorId) : ?>
                                                        <option value="<?= $movie->directorId ?>" selected="selected"
                                                        ><?= $director->name ?>
                                                    <?php
                                                    else: ?>
                                                        <option value="<?= $director->directorId ?>">
                                                            <?= $director->name ?></option>
                                                    <?php
                                                    endif; ?>
                                                <?
                                                endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-row text-center">
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit" name="updateMovie"
                                                        value="Обновить">
                                                    Обновить
                                                </button>
                                            </div>
                                        </div>
                                    <?
                                    endif; ?>
                                <?
                                endforeach; ?>

                            </form>
                        </div>
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