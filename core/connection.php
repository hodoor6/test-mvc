<?php

$host = '127.0.0.1';
$db = 'test-mvc';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


$stmt = $pdo->prepare("SELECT * FROM `director`");
$stmt->execute();
$directors= $row = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump($directors->name);


$stmt = $pdo->prepare("SELECT * FROM `movie`");
$stmt->execute();
$movies= $row = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump($movies);