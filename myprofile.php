<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
//error_reporting(0);
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_SESSION['uid'];
        $FName = $_POST['FirstName'];
        $LName = $_POST['LastName'];
        $empcode = $_POST['EmpCode'];
        $EmpDept = $_POST['EmpDept'];
        $EmpDesignation = $_POST['EmpDesignation'];
        $EmpContactNo = $_POST['EmpContactNo'];
        $gender = $_POST['gender'];
        $empjdate = $_POST['EmpJoingdate'];

        $empfinishwork = $_POST['EmpFinishWork'];
        $empworkingtime = $_POST['EmpWorkingTime'];
        $empsalary = $_POST['EmpSalary'];
        $empstatus = $_POST['EmpStatus'];
        $query = mysqli_query($conn, "update empdetail set EmpFinishWork = '$empfinishwork', EmpWorkingTime = '$empworkingtime', EmpSalary = '$empsalary', EmpStatus = '$empstatus', EmpFName='$FName',  EmpLName='$LName', EmpCode='$empcode', EmpDept='$EmpDept', EmpDesignation='$EmpDesignation', EmpContactNo='$EmpContactNo', EmpGender='$gender',EmpJoingDate='$empjdate' where ID='$eid'");
        if ($query) {
            $msg = "Your profile has been updated.";
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
        <title>My Profile</title>
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>

                    <form class="user" method="post" action="">
                        <?php
                        $eid = $_SESSION['uid'];
                        $ret = mysqli_query($conn, "select * from empdetail where ID='$eid'");
                        while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <div class="row">
                                <div class="col-4 mb-3">First Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="FirstName" name="FirstName"
                                                               aria-describedby="emailHelp" required="true"
                                                               value="<?php echo $row['EmpFName']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Last Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="LastName" name="LastName"
                                                               aria-describedby="emailHelp" required="true"
                                                               value="<?php echo $row['EmpLName']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Code</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpCode"
                                           name="EmpCode" aria-describedby="emailHelp" required="true"
                                           value="<?php echo $row['EmpCode']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Dept</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpDept"
                                           name="EmpDept" aria-describedby="emailHelp" required="true"
                                           value="<?php echo $row['EmpDept']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Desigantion</div>

                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpDesignation"
                                           name="EmpDesignation" aria-describedby="emailHelp" required="true"
                                           value="<?php echo $row['EmpDesignation']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employee Contact No.</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpContactNo"
                                           name="EmpContactNo" aria-describedby="emailHelp" required="true"
                                           value="<?php echo $row['EmpContactNo']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Email</div>
                                <div class="col-8 mb-3">
                                    <input type="email" class="form-control form-control-user" id="Email" name="Email"
                                           aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                           required="true" value="<?php echo $row['EmpEmail']; ?>" readonly="true">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Employee Working Time</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpWorkingTime"
                                           name="EmpWorkingTime" aria-describedby="emailHelp"
                                           value="<?php echo $row['EmpWorkingTime']; ?>" readonly="true">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Employee Salary</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="EmpSalary"
                                           name="EmpSalary" aria-describedby="emailHelp"
                                           value="<?php echo $row['EmpSalary']; ?>" readonly="true">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Employee Joing Date(YYYY-MM-DD)</div>
                                <div class="col-8  mb-3">
                                    <input type="text" class="form-control form-control-user"
                                           value="<?php echo $row['EmpJoingDate']; ?>" id="jDate" name="EmpJoingdate"
                                           aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Employee Finish Work Date(YYYY-MM-DD)</div>
                                <div class="col-8  mb-3">
                                    <input type="text" class="form-control form-control-user"
                                           value="<?php echo $row['EmpFinishWork']; ?>" id="empfinishwork" name="EmpFinishWork"
                                           aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Gender</div>
                                <div class="col-4 mb-3">

                                    <?php if ($row['EmpGender'] == "Male") {
                                        ?>
                                        <input type="radio" id="gender" name="gender" value="Male" checked="true">Male
                                        <input type="radio" name="gender" value="Female">Female
                                    <?php } else if ($row['EmpGender'] == "Female") { ?>
                                        <input type="radio" id="gender" name="gender" value="Male">Male
                                        <input type="radio" name="gender" value="Female" checked="true">Female
                                    <?php } else { ?>
                                        <input type="radio" id="gender" name="gender" value="Male">Male
                                        <input type="radio" name="gender" value="Female">Female
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Status</div>
                                <div class="col-4 mb-3">
                                    <?php if ($row['EmpStatus'] == "Active") {
                                        ?>
                                        <input type="radio" id="EmpStatus" name="EmpStatus" value="Active" checked="true">Active
                                        <input type="radio" name="EmpStatus" value="Inactive">Inactive
                                    <?php } else if ($row['EmpStatus'] == "Inactive") { ?>
                                        <input type="radio" id="EmpStatus" name="EmpStatus" value="Active">Active
                                        <input type="radio" name="EmpStatus" value="Inactive" checked="true">Inactive
                                    <?php } else { ?>
                                        <input type="radio" id="EmpStatus" name="EmpStatus" value="Active">Male
                                        <input type="radio" name="EmpStatus" value="Inactive">Female
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" name="submit" value="Update"
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
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
