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
        $query = mysqli_query($conn, "insert into empexp ( EmpID,Employer1Name, Employer1Designation, Employer1CTC,  Employer1WorkDuration, Employer2Name,  Employer2Designation, Employer2CTC, Employer2WorkDuration, Employer3Name, Employer3Designation, Employer3CTC, Employer3WorkDuration) value('$eid','$emp1name', '$emp1des', '$emp1ctc', '$emp1wd', '$emp2name', '$emp2des', '$emp2ctc', '$emp2wd', '$emp3name', '$emp3des', '$emp3ctc', '$emp3wd' )");
        if ($query) {
            $msg = "Your Expirence data has been submitted succeesfully.";
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
        <title>Employees Details</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Employees Details <br>
                        <a href="addemp.php" title="Add employee"><i class="fas fa-user-plus"></i></a> |
                        <a href="allemployees.php" title="Refresh"><i class="fas fa-sync-alt"></i></a> |
                        <a onclick="printData()" title="Print"><i class="fas fa-print"></i></a>
                        <style>
                            a:link {
                                color: chocolate;
                                background-color: transparent;
                                text-decoration: none;
                            }
                            a:visited {
                                color: grey;
                                background-color: transparent;
                                text-decoration: none;
                            }
                            a:hover {
                                color: dodgerblue;
                                background-color: transparent;
                                text-decoration: underline;
                            }
                            a:active {
                                color: yellow;
                                background-color: transparent;
                                text-decoration: underline;
                            }
                        </style>
                    </h1>
                    <script type="text/javascript">
                        function printData()
                        {
                            var divToPrint=document.getElementById("dataTable");
                            newWin= window.open("");
                            newWin.document.write(divToPrint.outerHTML);
                            newWin.print();
                            newWin.close();
                        }

                        $('button').on('click',function(){
                            printData();
                        })
                    </script>
                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                            echo $msg;
                        } ?> </p>
                    <div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" border="1" cellpadding="3">
                            <tr>
                                <th>№</th>
                                <th>Emp Code</th>
                                <th>Emp Full Name</th>
                                <th>Emp Dept: Designation</th>
                                <th>Emp Email</th>
                                <th>Emp Start</th>
                                <th>Emp Finish</th>
                                <th>Emp Status</th>
                                <th><i class="fas fa-user-cog fa"></i></th>
                            </tr>
                            <?php
                            $ret = mysqli_query($conn, "select * from empdetail");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['EmpCode']; ?></td>
                                    <td><?php echo $row['EmpFName'] ." ". $row['EmpLName']; ?></td>
                                    <td><?php
                                        if($row['EmpDept']==null || $row['EmpDesignation']==null)
                                            echo $row['EmpDept'] . $row['EmpDesignation'];
                                        else
                                            echo $row['EmpDept'] . ": " . $row['EmpDesignation'];
                                        ?></td>
                                    <td><?php echo $row['EmpEmail']; ?></td>
                                    <td style="width:110px;"><?php echo $row['EmpJoingDate']; ?></td>
                                    <td style="width:110px;"><?php echo $row['EmpFinishWork']; ?></td>
                                    <td><?php
                                        if($row['EmpStatus'] == "Active")
                                            echo '<span style="font-size: 10px; color: Tomato;"><i class="fas fa-circle"></i></span> <b>' . $row['EmpStatus'] . '</b>';
                                        elseif ($row['EmpStatus'] == "Inactive")
                                            echo '<b>' . $row['EmpStatus'] . '</del></b>';
                                        ?>
                                    </td>
                                    <td>
                                        <a href="editemp.php?editid=<?php echo $row['ID']; ?>" title="Edit"><i class="fas fa-edit"></i></a>
                                              <a href="empdelete.php?delid=<?php echo $row['ID']; ?>" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $cnt = $cnt + 1;
                            } ?>
                        </table>
                    </div>
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
