<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

?>
<?php
$title = "Редактирование режиссёра"; ?>
<!--Connecting header-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/header.php"; ?>
<!--Connecting User menu-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/user-menu.php" ?>
<div class="container-fluid h-100  pt-3">
    <div class="row justify-content-center align-items-center">
        <h2>Редактирование режиссёра</h2>
    </div>
    <hr/>
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="../../../model/directors.php" METHOD="POST">
                                <input type="hidden" name="directorId" value="<?php
                                if (!empty($_GET['directorId'])) {
                                    echo $_GET['directorId'];
                                }
                                ?>">
                                <?php
                                foreach (
                                    $directors as $director
                                ): ?>
                                    <?php
                                    if ($director->directorId == $_GET['directorId']) : ?>

                                        <div class="form-group">
                                            <label>Имя и фамилия режиссёра</label>
                                            <input class="form-control" type="text" required="required" minlength="3"
                                                   maxlength="50" name="directorName"
                                                   placeholder="Имя режиссёра например Иван Петров"
                                                   value="<?= $director->name ?>">
                                            <small class="form-text text-muted">Напишите имя и фамилию режисера от 3
                                                символов
                                                до 50 симфолов</small>
                                        </div>
                                        <div class="form-row text-center">
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit" name="updateDirector"
                                                        value="Обновить">
                                                    Обновить режиссёра
                                                </button>
                                            </div>
                                        </div>
                                    <?php
                                    endif; ?>
                                <?php
                                endforeach; ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Connecting footer-->
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/footer.php"; ?>
