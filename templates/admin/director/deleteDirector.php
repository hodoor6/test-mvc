<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/config/connection.php";

if (isset($_REQUEST['deleteDirectorId'])) {
    $deleteDirectorId = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['deleteDirectorId']))));
    try {
        $sql = "DELETE FROM `director` WHERE `director`.`directorId`=:deleteDirectorId";
        // Prepare statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":deleteDirectorId", $deleteDirectorId, PDO::PARAM_INT, 11);
        // execute the query
        $stmt->execute();
        header("Location: /templates/admin/director/director.php");
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
