<?php
$host = "localhost";
$user = "root";
$password = "muremure";
$dbname = "lms_db";

$dsn = "mysql:host=$host;dbname=$dbname";

$pdo = new PDO($dsn, $user, $password);

$sql = "SELECT * FROM books";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($books);
