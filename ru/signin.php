<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $query = mysqli_query($conn, "select ID from empdetail where  EmpEmail='$Email' && EmpPassword='$Password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['uid'] = $ret['ID'];
        header('location:welcome.php');
    } else {
        $msg = "Invalid Details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="АРМ Отдел Кадров">
    <meta name="author" content="Xuan Canh">
    <title>АРМ О.К Signin</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <a href="index.php"><h3 align="center" style="color: black; padding-top: 2%">АРМ Отдел Кадров</h3></a>
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                        echo $msg;
                                    } ?> </p>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="Email"
                                               name="Email" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address..." required="true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="Password"
                                               name="Password" placeholder="Password" required="true">
                                    </div>
                                    <p><input type="submit" class="btn btn-primary btn-user btn-block" name="login"
                                              value="Login"></p>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgetpassword.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="signup.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
