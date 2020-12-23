<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
        $empallnote = $_POST['EmpAllNote'];
        $query = mysqli_query($conn, "update empdetail set EmpAllNote= '$empallnote'");
        if ($query) {
            $msg = "Notice has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }
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
        <title>Notice to employees</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Notifications to all employees</h1>

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>

                    <form class="user" method="post" action="">
                        <?php
                        $aid = $_GET['editid'];
                        $ret = mysqli_query($conn, "select * from empdetail where ID='1'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="row">
                            <div class="col-4 mb-3">Message content</div>
                            <div class="col-8 mb-3">
                                    <textarea rows="3" class="form-control form-control-user" id="EmpAllNote"
                                              name="EmpAllNote" aria-describedby="emailHelp"
                                              value=""><?php echo $row['EmpAllNote']; ?></textarea>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Send notifications"
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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    </body>
    </html>
<?php } ?>
