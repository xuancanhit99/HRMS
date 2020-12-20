<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$msg='';
global $conn;
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Human resource management system">
        <meta name="author" content="Xuan Canh">
        <title>Admin Profile</title>
        <script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Employee</h1>
                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>
                    <form class="user" method="post" action="">
                        <?php
                        $aid = $_GET['editid'];
                        $ret = mysqli_query($conn, "select * from empdetail where ID='$aid'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Full Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user" readonly="true"
                                                               id="FullName" name="FullName"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['EmpFName'] . ' ' .  $row['EmpLName'] ; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Email</div>
                                <div class="col-8 mb-3">
                                    <input type="email" class="form-control form-control-user" id="Email" name="Email"
                                           aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                           value="<?php echo $row['EmpEmail']; ?>" readonly="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Registration Date</div>
                                <div class="col-8  mb-3">
                                    <input type="text" class="form-control form-control-user" readonly="true"
                                           value="<?php echo $row['PostingDate']; ?>" id="PostingDate"
                                           name="PostingDate" aria-describedby="emailHelp">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4">
                                <a href="editempprofile.php?editid=<?php echo $aid; ?>">
                                    <input type="button" value="Edit Profile Details" class="btn btn-primary btn-user btn-block"></a>
                            </div>
                            <div class="col-4">
                                <a href="editempedu.php?editid=<?php echo $aid; ?>">
                                    <input type="button" value="Edit Education Details" class="btn btn-primary btn-user btn-block"></a>
                            </div>
                            <div class="col-4">
                                <a href="editempexp.php?editid=<?php echo $aid; ?>">
                                    <input type="button" value="Edit Experience Details" class="btn btn-primary btn-user btn-block"></a>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $(".jDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        }).datepicker("update", "12/12/2020");
    </script>
    </body>
    </html>
<?php } ?>
