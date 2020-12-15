<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
global $conn;
//error_reporting(0);
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
        $coursepg = $_POST['coursepg'];
        $schoolclgpg = $_POST['schoolclgpg'];
        $yoppg = $_POST['yoppg'];
        $pipg = $_POST['pipg'];
        $coursegra = $_POST['coursegra'];
        $schoolclggra = $_POST['schoolclggra'];
        $yopgra = $_POST['yopgra'];
        $pigra = $_POST['pigra'];
        $coursessc = $_POST['coursessc'];
        $schoolclgssc = $_POST['schoolclgssc'];
        $yopssc = $_POST['yopssc'];
        $pissc = $_POST['pissc'];
        $coursehsc = $_POST['coursehsc'];
        $schoolclghsc = $_POST['schoolclghsc'];
        $yophsc = $_POST['yophsc'];
        $pihsc = $_POST['pihsc'];

        $query = mysqli_query($conn, "update empedu set Course1='$coursepg', SchoolCollege1='$schoolclgpg', YearPassing1='$yoppg',  Percentage1= '$pipg', Course2='$coursegra',  SchoolCollege2='$schoolclggra', YearPassing2= '$yopgra', Percentage2='$pigra', Course3='$coursessc', SchoolCollege3='$schoolclgssc', YearPassing3= '$yopssc', Percentage3= '$pissc', Course4='$coursehsc', SchoolCollege4='$schoolclghsc', YearPassing4='$yophsc', Percentage4='$pihsc' where EmpID='$eid'");
        if ($query) {
            $msg = "Employee Education data has been updated succeesfully.";
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
        <title>Edit Employee Education</title>
        <script src="https://kit.fontawesome.com/e427de2876.js" crossorigin="anonymous"></script>
        <!-- Custom styles for this template-->
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Employee Education</h1>

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>

                    <form class="user" method="post" action="">
                        <?php
                        $aid = $_GET['editid'];
                        $ret = mysqli_query($conn, "select * from empedu where EmpID='$aid'");
                        if (!$ret)
                        {
                            die('Error: ' . mysqli_error($conn));
                        }
                        if(mysqli_num_rows($ret) > 0){}
                        else{
                            mysqli_query($conn, "insert into empedu(EmpID) value('$aid')");
                        }

                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {

                            ?>

                            <div class="row">
                                <div class="col-4 mb-3">Course 1</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursepg" name="coursepg"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Course1']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College 1</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclgpg" name="schoolclgpg"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['SchoolCollege1']; ?>"></div>
                            </div>


                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing 1</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yoppg" name="yoppg"
                                           aria-describedby="emailHelp" value="<?php echo $row['YearPassing1']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Percentage 1</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pipg" name="pipg"
                                           aria-describedby="emailHelp" value="<?php echo $row['Percentage1']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course 2</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursegra" name="coursegra"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Course2']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College 2</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclggra" name="schoolclggra"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['SchoolCollege2']; ?>"></div>
                            </div>


                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing 2</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yopgra" name="yopgra"
                                           aria-describedby="emailHelp" value="<?php echo $row['YearPassing2']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Percentage 2</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pigra" name="pigra"
                                           aria-describedby="emailHelp" value="<?php echo $row['Percentage2']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course 3</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursessc" name="coursessc"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Course3']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College 3</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclgssc" name="schoolclgssc"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['SchoolCollege3']; ?>"></div>
                            </div>


                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing 3</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yopssc" name="yopssc"
                                           aria-describedby="emailHelp" value="<?php echo $row['YearPassing3']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Percentage 3</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pissc" name="pissc"
                                           aria-describedby="emailHelp" value="<?php echo $row['Percentage3']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course 4</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursehsc" name="coursehsc"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['Course4']; ?>"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College 4</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclghsc" name="schoolclghsc"
                                                               aria-describedby="emailHelp"
                                                               value="<?php echo $row['SchoolCollege4']; ?>"></div>
                            </div>


                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing 4</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yophsc" name="yophsc"
                                           aria-describedby="emailHelp" value="<?php echo $row['YearPassing4']; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Percentage in 4</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pihsc" name="pihsc"
                                           aria-describedby="emailHelp" value="<?php echo $row['Percentage4']; ?>">
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
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
