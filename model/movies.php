<?php

include($_SERVER['DOCUMENT_ROOT'] . '/core/connection.php');

if (!empty($_REQUEST['updateMovie'])) {
    $movieDirectorId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieDirectorId']))));
    $movieName = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieName']))));
    $movieDescription = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieDescription']))));
    $movieReleaseDate = date(
        "Y-m-d",
        strtotime(htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieReleaseDate'])))))
    );
    $updateMovieId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['updateMovieId']))));

    $sql = "UPDATE movie SET 
                 directorId=:movieDirectorId,
                 name=:movieName,
                 description=:movieDescription,
                 releaseDate=:movieReleaseDate
    WHERE movieId=:updateMovieId";

    // Prepare statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':movieDirectorId', $movieDirectorId, PDO::PARAM_INT, 11);
    $stmt->bindParam(':movieName', $movieName, PDO::PARAM_STR, 50);
    $stmt->bindParam(':movieDescription', $movieDescription, PDO::PARAM_STR, 5000);
    $stmt->bindParam(':movieReleaseDate', $movieReleaseDate, PDO::PARAM_STR, 10);
    $stmt->bindParam(':updateMovieId', $updateMovieId, PDO::PARAM_INT, 11);
    // execute the query
    $stmt->execute();
    header("Location: /index.php");
}



if (!empty($_REQUEST['updateMovie'])) {
    $movieDirectorId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieDirectorId']))));
    $movieName = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieName']))));
    $movieDescription = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieDescription']))));
    $movieReleaseDate = date(
        "Y-m-d",
        strtotime(htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['movieReleaseDate'])))))
    );
    $updateMovieId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['updateMovieId']))));

    $sql = "UPDATE movie SET 
                 directorId=:movieDirectorId,
                 name=:movieName,
                 description=:movieDescription,
                 releaseDate=:movieReleaseDate
    WHERE movieId=:updateMovieId";

    // Prepare statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':movieDirectorId', $movieDirectorId, PDO::PARAM_INT, 11);
    $stmt->bindParam(':movieName', $movieName, PDO::PARAM_STR, 50);
    $stmt->bindParam(':movieDescription', $movieDescription, PDO::PARAM_STR, 5000);
    $stmt->bindParam(':movieReleaseDate', $movieReleaseDate, PDO::PARAM_STR, 10);
    $stmt->bindParam(':updateMovieId', $updateMovieId, PDO::PARAM_INT, 11);
    // execute the query
    $stmt->execute();
    header("Location: /index.php");
}
