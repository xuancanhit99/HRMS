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

        $query = mysqli_query($conn, "insert into empedu( EmpID,Course1, SchoolCollege1, YearPassing1,  Percentage1, Course2,  SchoolCollege2, YearPassing2, Percentage2, Course3, SchoolCollege3, YearPassing3, Percentage3, Course4, SchoolCollege4, YearPassing4, Percentage4) value('$eid','$coursepg', '$schoolclgpg', '$yoppg', '$pipg', '$coursegra', '$schoolclggra', '$yopgra', '$pigra', '$coursessc', '$schoolclgssc', '$yopssc', '$pissc', '$coursehsc', '$schoolclghsc', '$yophsc', '$pihsc' )");
        if ($query) {
            $msg = "Your Education data has been submitted succeesfully.";
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
        <title>My Education</title>
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
                    <h1 class="h3 mb-4 text-gray-800">My Education</h1>
                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>
                    <?php
                    $empid = $_SESSION['uid'];
                    $query = mysqli_query($conn, "select * from empedu where EmpID=$empid");
                    $row = mysqli_fetch_array($query);
                    if ($row > 0) {
                        ?>
                        <p style="font-size:16px; color:red" align="center">Your Education details already added. Now
                            you can only edit the record. </p>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>First Course Name</th>
                                <td><?php echo $row['Course1']; ?></td>
                            </tr>
                            <tr>
                                <th>First School/College</th>
                                <td><?php echo $row['SchoolCollege1']; ?></td>
                            </tr>
                            <tr>
                                <th>First Year of Passing</th>
                                <td><?php echo $row['YearPassing1']; ?></td>
                            </tr>
                            <tr>
                                <th>First Percent</th>
                                <td><?php echo $row['Percentage1']; ?></td>
                            </tr>
                            <tr>
                                <th>Second Course Name</th>
                                <td><?php echo $row['Course2']; ?></td>
                            </tr>
                            <tr>
                                <th>Second School/College</th>
                                <td><?php echo $row['SchoolCollege2']; ?></td>
                            </tr>
                            <tr>
                                <th>Second Year of Passing</th>
                                <td><?php echo $row['YearPassing2']; ?></td>
                            </tr>
                            <tr>
                                <th>Second Percent</th>
                                <td><?php echo $row['Percentage2']; ?></td>
                            </tr>
                            <th>Third Course Name</th>
                            <td><?php echo $row['Course3']; ?></td>
                            </tr>
                            <tr>
                                <th>Third School/College</th>
                                <td><?php echo $row['SchoolCollege3']; ?></td>
                            </tr>
                            <tr>
                                <th>Third Year of Passing</th>
                                <td><?php echo $row['YearPassing3']; ?></td>
                            </tr>
                            <tr>
                                <th>Third Percent</th>
                                <td><?php echo $row['Percentage3']; ?></td>
                            </tr>
                            <th>Fourth Course Name</th>
                            <td><?php echo $row['Course4']; ?></td>
                            </tr>
                            <tr>
                                <th>Fourth School/College</th>
                                <td><?php echo $row['SchoolCollege4']; ?></td>
                            </tr>
                            <tr>
                                <th>Fourth Year of Passing</th>
                                <td><?php echo $row['YearPassing4']; ?></td>
                            </tr>
                            <tr>
                                <th>Fourth Percent</th>
                                <td><?php echo $row['Percentage4']; ?></td>
                            </tr>
                        </table>
                    <?php } else { ?>
                        <form class="user" method="post" action="">
                            <div class="row">
                                <div class="col-4 mb-3">Course Post Graduation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursepg" name="coursepg"
                                                               aria-describedby="emailHelp" value=""></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College Post Graduation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclgpg" name="schoolclgpg"
                                                               aria-describedby="emailHelp" value=""></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing Post Graduation</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yoppg" name="yoppg"
                                           aria-describedby="emailHelp" value=""></div>
                            </div>

                            <div class="row">
                                <div class="col-4 mb-3">Percentage in PG</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pipg" name="pipg"
                                           aria-describedby="emailHelp" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course Graduation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursegra" name="coursegra"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College Graduation</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclggra" name="schoolclggra"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing Graduation</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yopgra" name="yopgra"
                                           aria-describedby="emailHelp" value="" required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Percentage in Graduation</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pigra" name="pigra"
                                           aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course SSC</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursessc" name="coursessc"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College SSC</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclgssc" name="schoolclgssc"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing SSC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yopssc" name="yopssc"
                                           aria-describedby="emailHelp" value="" required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Percentage in SSC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pissc" name="pissc"
                                           aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Course HSC</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="coursehsc" name="coursehsc"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">School/College HSC</div>
                                <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"
                                                               id="schoolclghsc" name="schoolclghsc"
                                                               aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Year of Passing HSC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="yophsc" name="yophsc"
                                           aria-describedby="emailHelp" value="" required="true"></div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">Percentage in HSC</div>
                                <div class="col-8 mb-3">
                                    <input type="text" class="form-control form-control-user" id="pihsc" name="pihsc"
                                           aria-describedby="emailHelp" value="" required="true">
                                </div>
                            </div>
                            <div class="row" style="margin-top:4%">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <input type="submit" name="submit" value="submit"
                                           class="btn btn-primary btn-user btn-block">
                                </div>
                            </div>
                        </form>
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
