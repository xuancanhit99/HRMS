<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $empid = $_SESSION['uid'];
        $cpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $query = mysqli_query($conn, "select ID from empdetail where ID='$empid' and EmpPassword='$cpassword'");
        $row = mysqli_fetch_array($query);
        if ($row > 0) {
            $ret = mysqli_query($conn, "update empdetail set EmpPassword='$newpassword' where ID='$empid'");
            $msg = "Your password successully changed";
        } else {
            $msg = "Your current password is wrong";
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
        <title>Change Password</title>
        <script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('New Password and Confirm Password field does not match');
                    document.changepassword.confirmpassword();
                    return false;
                }
                return true;
            }

        </script>
    </head>

    <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php') ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once('includes/header.php') ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>
                    <form name="changepassword" class="user" method="post" onsubmit="return checkpass();">
                        <?php
                        $cid = $_SESSION['uid'];
                        $ret = mysqli_query($conn, "select * from empdetail where ID='$cid'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <div class="row">
                                <div class="col-4 mb-3">Current Password</div>
                                <div class="col-8 mb-3"><input type="Password" class="form-control form-control-user"
                                                               id="Password" name="currentpassword" value=""
                                                               required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">New Password</div>
                                <div class="col-8 mb-3"><input type="Password" class="form-control form-control-user"
                                                               id="newpassword" name="newpassword" value=""
                                                               required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Confirm Password</div>
                                <div class="col-8 mb-3">
                                    <input type="Password" class="form-control form-control-user" id="confirmpassword"
                                           name="confirmpassword" value="" required="true"></div>
                            </div>
                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Change"
                                       class="btn btn-primary btn-user btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $(".jDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        }).datepicker("update", "12/12/2020");
    </script>
    </body>
    </html>
<?php } ?>
