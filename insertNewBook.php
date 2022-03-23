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


        if(isset($_POST["submit"])) {
            for($i = 0; $i < $_POST["amount"]; $i++) {
                $sql = "INSERT INTO books(title, author, date_published, genre) VALUES (:title, :author, :datePublished, :genre)";
                $stmt = $pdo->prepare($sql);
            
                try {
                    $stmt->execute(["title" => $_POST["title"], "author" => $_POST["author"], "datePublished" => $_POST["datePublished"], "genre" => $_POST["genre"]]);
                } catch (PDOException $error) {
                    echo $error->getMessage();
                }
        }
        }
    } else {
        header("Location: login.php");
    }


    // exit;
?>

<html>
    <?php require("./header.php"); ?>
                <!-- Begin Page Content -->
                <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Insert New Book!</h1>
                    </div>
                    <form class="user" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <!-- <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="First Name" name="firstName" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                    placeholder="Last Name" name="secondName" required>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <input type="title" class="form-control form-control-user" id="title"
                                placeholder="Enter Book Title" name="title" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="author"
                                placeholder="Insert Book Author" name="author" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-user" id="datePublished"
                                placeholder="Date Published" name="datePublished" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="amount"
                                placeholder="Insert amount of book copies" name="amount" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="genre"
                                placeholder="Insert Book Genre. Separate with commas" name="genre" required>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password" name="password1" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Repeat Password" name="password2" required>
                            </div>
                        </div> -->
                        <input type="submit" name="submit" value="Insert New Book" href="login.html" class="btn btn-primary btn-user btn-block" >
                        <hr>
                        <!-- <input href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a> -->
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.html">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require("./footer.php"); ?>
</html>