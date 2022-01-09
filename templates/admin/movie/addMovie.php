<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

?>
<?php
$title = "Добавление фильма"; ?>
<!--Connecting header-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/header.php"; ?>
<!--Connecting User menu-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/user-menu.php" ?>
<div class="container-fluid h-100  pt-3">
    <div class="row justify-content-center align-items-center">
        <h2>Добавление фильма</h2>
    </div>
    <hr/>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="../../../model/movies.php" METHOD="POST">
                                    <div class="form-group">
                                        <label>Названия фильма</label>
                                        <input class="form-control" type="text" required="required" minlength="3"
                                               maxlength="50" name="movieName"
                                               placeholder="Названия фильма"
                                               value="">
                                        <small class="form-text text-muted">Напишите название фильма от 3 символов
                                            до 50 симфолов</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Описание фильма</label>
                                        <textarea class="form-control" required="required" minlength="3"
                                                  maxlength="5000" cols="25" rows="4"
                                                  placeholder="Описание фильма"
                                                  name="movieDescription"></textarea>
                                        <small class="form-text text-muted">Напишите описание к фильму от 3 символов
                                            до 5000 символов</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Дата выхода</label>
                                        <input class="form-control" type="date" required="required" minlength="10"
                                               name="movieReleaseDate"
                                               value="">
                                        <small class="form-text text-muted">Виберете дату выхода фильма</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Выберите режиссёра</label>
                                        <select class="form-control" name="movieDirectorId">
                                            <?php
                                            foreach (
                                                $directors
                                                as $director
                                            ): ?>

                                                <?php
                                                if ($movie->directorId === $director->directorId) : ?>
                                                    <option value="<?= $movie->directorId ?>" selected="selected"
                                                    ><?= $director->name ?>
                                                <?php
                                                else: ?>
                                                    <option value="<?= $director->directorId ?>">
                                                        <?= $director->name ?></option>
                                                <?php
                                                endif; ?>
                                            <?php
                                            endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" name="addMovie"
                                                    value="Добавить">
                                                Добавить фильм
                                            </button>
                                        </div>
                                    </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Connecting footer-->
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/footer.php"; ?>
