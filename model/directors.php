<?php

include($_SERVER['DOCUMENT_ROOT'] . '/core/config/connection.php');

if (!empty($_REQUEST['updateDirector'])) {
    $directorName = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['directorName']))));
    $updateDirectorId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['directorId']))));

    $sql = "UPDATE `director` SET 
                 name=:directorName
    WHERE directorId=:updateDirectorId
    ";

    // Prepare statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':directorName', $directorName, PDO::PARAM_STR, 50);
    $stmt->bindParam(':updateDirectorId', $updateDirectorId, PDO::PARAM_STR, 11);
    // execute the query
    $stmt->execute();
    header("Location: /templates/admin/director/director.php");
    exit();
}

if (!empty($_REQUEST['addDirector'])) {
    $directorName = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['directorName']))));

    $sql = "INSERT INTO `director` SET 
                  name=:directorName
  ";

    // Prepare statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':directorName', $directorName, PDO::PARAM_STR, 50);
    // execute the query
    $stmt->execute();
    header("Location: /templates/admin/director/director.php");
    exit();
}

header("Location: /templates/admin/director/director.php");
exit();
