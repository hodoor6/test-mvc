<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

?>
<?php
$title = "Добавить режиссёра"; ?>
<!--Connecting header-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/header.php"; ?>
<!--Connecting User menu-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/templates/admin/layout/user-menu.php" ?>
<div class="container-fluid h-100  pt-3">
    <div class="row justify-content-center align-items-center">
        <h2>Добавить режиссёра</h2>
    </div>
    <hr/>
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">

            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="../../../model/directors.php" METHOD="POST">
                                            <div class="form-group">
                                            <label>Имя и фамилия режиссёра</label>
                                            <input class="form-control" type="text" required="required" minlength="3"
                                                   maxlength="50" name="directorName"
                                                   placeholder="Имя режиссёра например Иван Петров"
                                                   value="">
                                            <small class="form-text text-muted">Напишите имя и фамилию  режисера от 3 символов
                                                до 50 симфолов</small>
                                        </div>
                                        <div class="form-row text-center">
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit" name="addDirector"
                                                        value="Добавить">
                                                    Добавить режиссёра
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
