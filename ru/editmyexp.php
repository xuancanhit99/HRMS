<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_SESSION['uid'];
        $emp1name = $_POST['emp1name'];
        $emp1des = $_POST['emp1des'];
        $emp1ctc = $_POST['emp1ctc'];
        $emp1wd = $_POST['emp1workduration'];
        $emp2name = $_POST['emp2name'];
        $emp2des = $_POST['emp2des'];
        $emp2ctc = $_POST['emp2ctc'];
        $emp2wd = $_POST['emp2workduration'];
        $emp3name = $_POST['emp3name'];
        $emp3des = $_POST['emp3des'];
        $emp3ctc = $_POST['emp3ctc'];
        $emp3wd = $_POST['emp3workduration'];
        $query = mysqli_query($conn, "update empexp set Employer1Name='$emp1name',  Employer1Designation ='$emp1des', Employer1CTC ='$emp1ctc', Employer1WorkDuration='$emp1wd', Employer2Name='$emp2name',  Employer2Designation ='$emp2des', Employer2CTC ='$emp2ctc', Employer2WorkDuration='$emp2wd', Employer3Name='$emp3name',  Employer3Designation ='$emp3des', Employer3CTC ='$emp3ctc', Employer3WorkDuration='$emp3wd'  where EmpID='$eid'");
        if ($query) {
            $msg = "Your Expirence has been updated.";
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
        <meta name="description" content="АРМ Отдел Кадров">
        <meta name="author" content="Xuan Canh">
        <title>Edit My Expirence</title>
        <script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit My Experience</h1>
                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>
                    <form class="user" method="post" action="">
                        <?php
                        $empid = $_SESSION['uid'];
                        $ret = mysqli_query($conn, "select * from empexp where EmpID='$empid'");
                        $num = mysqli_num_rows($ret);
                        if ($num > 0){
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp1name" name="emp1name"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer1Name']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 Designation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp1des" name="emp1des" aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer1Designation']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 CTC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp1ctc"
                                           name="emp1ctc" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer1CTC']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 1 WorkDuration</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp1workduration"
                                           name="emp1workduration" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer1WorkDuration']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp2name" name="emp2name"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer2Name']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 Designation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp2des" name="emp2des" aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer2Designation']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 CTC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp2ctc"
                                           name="emp2ctc" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer2CTC']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 2 WorkDuration</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp2workduration"
                                           name="emp2workduration" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer2WorkDuration']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Name</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp3name" name="emp3name"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer3Name']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 Designation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="emp3des" name="emp3des" aria-describedby="emailHelp"
                                                               value="<?php echo $row['Employer3Designation']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 CTC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp3ctc"
                                           name="emp3ctc" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer3CTC']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Employer 3 WorkDuration</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="emp3workduration"
                                           name="emp3workduration" aria-describedby="emailHelp"
                                           value="<?php echo $row['Employer3WorkDuration']; ?>">
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
                    <?php } else { ?>
                        <div class="row" style="margin-top:4%">
                            <div class="col-12" style="font-size:18px; color:red;">First Add your experience details
                                after that you can edit experience details.
                            </div>

                        </div>
                    <?php } ?>
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
