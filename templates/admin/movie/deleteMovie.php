<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

if (isset($_REQUEST['deleteMovieId'])) {
    $deleteMovieId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['deleteMovieId']))));
    try {
        $sql = "DELETE FROM `movie` WHERE `movie`.`movieId`=:deleteMovieId";
        // Prepare statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":deleteMovieId", $deleteMovieId, PDO::PARAM_INT, 11);
        // execute the query
        $stmt->execute();
        header("Location: /index.php");
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
