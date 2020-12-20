<?php
session_start();
include('includes/dbconnection.php');
global $conn;
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Human resource management system">
    <meta name="author" content="Xuan Canh">
    <title>Welcome to HRMS</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php include_once('includes/header.php'); ?>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Human Resource Management System</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4"></div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <?php
                        $empid = $_SESSION['uid'];
                        $ret = mysqli_query($conn, "select EmpFName,EmpLName, EmpNote, EmpStatus, EmpAllNote from empdetail where ID='$empid'");
                        $row = mysqli_fetch_array($ret);
                        $fname = $row['EmpFName'];
                        $lname = $row['EmpLName'];
                        $empNote = $row['EmpNote'];
                        $empAllNote = $row['EmpAllNote'];
                        $empStatus = $row['EmpStatus'];
                        ?>
                        <div class="card border-left-primary shadow h-10 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Welcome Back to HRMS !
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fname . " " . $lname; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Notices from administrators:
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?php
                                            if($empNote == "" && $empAllNote == "")
                                                if($empStatus == "")
                                                    echo "Welcome to our company !!!" . "<br>". "New members, please update your personal information, experience and education.";
                                                else
                                                    echo "You have no notifications, have a good day!!!";
                                            else if ($empNote != "" && $empAllNote == "")
                                                echo $empNote;
                                            else if ($empNote == "" && $empAllNote != "")
                                                echo '<span style="font-size: 20px; color: skyblue;"><i class="fas fa-bell"></i></span>' . $empAllNote;
                                            else
                                                echo $empNote . '<br> <br> <span style="font-size: 20px; color: skyblue;"><i class="fas fa-bell"></i></span>' . " " . $empAllNote;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php include_once('includes/footer.php'); ?>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
</body>
    <?php
}
?>