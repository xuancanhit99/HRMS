<?php
include('includes/dbconnection.php');
global $conn;
error_reporting(0);
if (isset($_POST['submit'])) {
    $FName = $_POST['FirstName'];
    $LName = $_POST['LastName'];
    $empcode = $_POST['empcode'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $EmpDept = $_POST['EmpDept'];
    $EmpDesignation = $_POST['EmpDesignation'];
    $EmpContactNo = $_POST['EmpContactNo'];
    $gender = $_POST['gender'];
    $empjdate = $_POST['EmpJoingdate'];
    $empfinishwork = $_POST['EmpFinishWork'];
    $empworkingtime = $_POST['EmpWorkingTime'];
    $empsalary = $_POST['EmpSalary'];
    $empnote = $_POST['EmpNote'];
    $empstatus = $_POST['EmpStatus'];
    $ret = mysqli_query($conn, "select EmpEmail from empdetail where EmpEmail='$Email'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
        $msg = "This email already associated with another account";
    } else {
        $query = mysqli_query($conn, "insert into empdetail(EmpFName, EmpLName, EmpCode, EmpEmail, EmpPassword, EmpDept, EmpDesignation, EmpContactNo, EmpWorkingTime, EmpSalary, EmpJoingDate, EmpFinishWork, EmpNote, EmpGender, EmpStatus) value('$FName', 
'$LName', '$empcode', '$Email', '$Password', '$EmpDept', '$EmpDesignation', '$EmpContactNo', '$empworkingtime', '$empsalary', '$empjdate', '$empfinishwork', '$empnote', '$gender', '$empstatus')");
        if ($query) {
            $eid  = $conn->insert_id;
            $msg = "You have successfully added." . '<br>' . "You can add emp's education, experiences in the edit of the table";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }

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
    <title>Add Employee Profile</title>
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
                <h1 class="h3 mb-4 text-gray-800">Add Employee Profile</h1>
                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                        echo $msg;
                    } ?> </p>
                <form class="user" method="post" action="">
                        <div class="row">
                            <div class="col-4 mb-3">First Name</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="FirstName"
                                       name="FirstName"  pattern="[A-Za-z ]+"
                                       required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Last Name</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="LastName"
                                       name="LastName" pattern="[A-Za-z ]+" required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Code</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="empcode" name="empcode"
                                       pattern="[0-9]+" required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Dept</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="EmpDept"
                                       name="EmpDept">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Desigantion</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="EmpDesignation"
                                       name="EmpDesignation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Contact No.</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="EmpContactNo"
                                       name="EmpContactNo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Email</div>
                            <div class="col-8 mb-3">
                                <input type="email" class="form-control form-control-user" id="Email" name="Email"
                                       placeholder="Email Address" required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Password</div>
                            <div class="col-8 mb-3">
                                <input type="password" class="form-control form-control-user" id="Password"
                                       name="Password" placeholder="Password" required="true">
                                <i class="far fa-eye" id="togglePassword"></i>
                            </div>
                        </div>
                        <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#Password');
                            togglePassword.addEventListener('click', function (e) {
                                // toggle the type attribute
                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                password.setAttribute('type', type);
                                // toggle the eye slash icon
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Working Time</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="EmpWorkingTime"
                                       name="EmpWorkingTime">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Salary</div>
                            <div class="col-8 mb-3">
                                <input type="text" class="form-control form-control-user" id="EmpSalary"
                                       name="EmpSalary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Joing Date(YYYY-MM-DD)</div>
                            <div class="col-8  mb-3">
                                <input type="text" class="form-control form-control-user"
                                       value="" id="jDate" name="EmpJoingdate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Finish Work Date(YYYY-MM-DD)</div>
                            <div class="col-8  mb-3">
                                <input type="text" class="form-control form-control-user"
                                       value="" id="$empfinishwork"
                                       name="EmpFinishWork">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Employee Note</div>
                            <div class="col-8 mb-3">
                                    <textarea rows="3" class="form-control form-control-user" id="EmpNote"
                                              name="EmpNote"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Gender</div>
                            <div class="col-4 mb-3">
                                    <input type="radio" id="gender" name="gender" value="Male">Male
                                    <input type="radio" name="gender" value="Female">Female
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">Status</div>
                            <div class="col-4 mb-3">
                                    <input type="radio" id="EmpStatus" name="EmpStatus" value="Active">Active
                                    <input type="radio" name="EmpStatus" value="Inactive">Inactive
                            </div>
                        </div>
                    <div class="row" style="margin-top:4%">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <input type="submit" name="submit" value="Add Employee" class="btn btn-primary btn-user btn-block">
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
