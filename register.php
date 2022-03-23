<?php 
    // require("./config/dbConnnect.php");
    $host = "localhost";
    $user = "root";
    $password = "muremure";
    $dbname = "lms_db";
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password);
    
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email = $_POST["email"];
    $pswd1 = $_POST["password1"];
    $pswd2 = $_POST["password2"];
    $phoneNumber = $_POST["phone"];


    if (isset($_POST["submit"])) {
        $errors = [];
        if(!preg_match("/^[a-zA-Z\s]+$/", $fName)) {
            $errors["firstname"] = "Invalid name";
        }

        if(!preg_match("/^[a-zA-Z\s]+$/", $lName)) {
            $errors["firstname"] = "No lastname number was entered";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["firstname"] = "No email number was entered";
        }

        if(!isset($pswd2) || $pswd1 != $pswd2) {
            $errors["phone"] = "Passwords don't match";
        }


        if(count($errors) != 0) {
            $sql = "INSERT INTO users(first_name, last_name, phone_number, email,  password) VALUES (:fName, :lName, :phone_number, :email, :password)";
            $stmt = $pdo->prepare($sql);
            if($stmt->execute(["fName" => $fName, "lName" => $lName, "phone_number" => $phoneNumber, "email" => $email, "password" => md5($pswd1)])) {
                header("Location: login.php");
            } else {
                echo $pdo->errorCode()."<br>";
                echo $pdo->errorInfo();
            }    
        } else {
            echo "Errors in the form";
        }
        

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School LMS2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="firstName" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="secondName" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputPhone"
                                        placeholder="Phone number" name="phone" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password1" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password2" required>
                                    </div>
                                </div>
                                <input type="submit" name="submit" value="Register Account" href="login.html" class="btn btn-primary btn-user btn-block" >
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>