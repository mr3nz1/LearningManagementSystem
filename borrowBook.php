<?php 
session_start();
if(isset($_SESSION["userEmail"])) {
  $host = "localhost";
  $user = "root";
  $password = "muremure";
  $dbname = "lms_db";
  $dsn = "mysql:host=$host;dbname=$dbname";
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $bookId = htmlentities($_GET["bookId"]);
  $borrowerId = htmlentities($_GET["borrowerId"]);

  $sql = "INSERT INTO borrowed_books (user_id, book_id) VALUES (:borrowerId, :bookId)";
  $stmt = $pdo->prepare($sql);

  try {
    $stmt->execute(["borrowerId" => $borrowerId, "bookId" => $bookId]);  
  } catch (PDOException $error) {
    echo $error;
  }
  



    
}
