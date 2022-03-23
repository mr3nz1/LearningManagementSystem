<?php 
  session_start();
  
  if(isset($_SESSION["userEmail"]) && isset($_SESSION["userName"])) {
    $host = "localhost";
    $user = "root";
    $password = "muremure";
    $dbname = "lms_db";

    $dsn = "mysql:host=$host;dbname=$dbname";

    $pdo = new PDO($dsn, $user, $password);

    $bookId = $_GET["bookId"];
    

    $sql = "DELETE FROM books WHERE id = :bookId";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(["bookId" => $bookId]);
  } else {
    header("Location: tables.php");
  }
?>