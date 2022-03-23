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

    $borrowedBookId = $_GET["borrowedBookId"];
    $sql = "SELECT * FROM borrowed_books WHERE id = :borrowedBookId";
    try {
      $stmt = $pdo->prepare($sql);
      $stmt->execute(["borrowedBookId" => $borrowedBookId]);
      $borrowedBookInfo = $stmt->fetchAll(PDO::FETCH_OBJ);

      
      if (count($borrowedBookInfo) == 1) {
        $bookId = $borrowedBookInfo[0]->book_id;
        $borrowerId = $borrowedBookInfo[0]->borrower_id;
        $borrowedBookAt = $borrowedBookInfo[0]->borrowed_at;
        
        $sql1 = "INSERT INTO returned_books(borrower_id, book_id, borrowed_at) VALUES (:borrowerId, :bookId, :borrowed_at)";
        $stmt1 = $pdo->prepare($sql1);

        try {
          $stmt1->execute(["borrowerId" => $borrowerId, "bookId" => $bookId, "borrowed_at" => $borrowedBookAt]);
          echo true;
          // Removing the book frim borrowed_books table 
        } catch(PDOException $error) {
          echo $error;
        }
      }
    } catch(PDOException $error) {
      echo $error;
    }

  } else {
    header("Location: tables.php");
  }