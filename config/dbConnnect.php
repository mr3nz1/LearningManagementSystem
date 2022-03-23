<?
$host = "localhost";
$user = "root";
$password = "muremure";
$dbname = "lms_db";

$dsn = "mysql:host=$host;dbname=$dbname";

$pdo = new PDO($dsn, $user, $password);
?>