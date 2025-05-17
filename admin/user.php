<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$query_Recordset2 = "SELECT * FROM user";
$Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User | The Wedding Matrimony</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"> <a
                    class="navbar-brand brand-logo" href="home.php"><img src="../images/logo1.png" alt="logo"
                        style="width: auto; height: 50px;" /></a> </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span> </button>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include('header.php'); ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2"> <i
                                    class="mdi mdi-office"></i> </span> User </h3>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th> User Id </th>
                                                    <th> Full Name </th>
                                                    <th> Email </th>
                                                    <th> Mobile </th>
                                                    <th> Gender </th>
                                                    <th> Dob </th>
                                                    <th> Age </th>
                                                    <th> Mothertongue </th>
                                                    <th> Religion </th>
                                                    <th> Caste </th>
                                                    <th> Occupation </th>
                                                    <th> Income </th>
                                                    <th> Education </th>
                                                    <th> Country </th>
                                                    <th> State </th>
                                                    <th> City </th>
                                                    <th> Father Name </th>
                                                    <th> Mother Name </th>
                                                    <th> Brothers </th>
                                                    <th> Sisters </th>
                                                    <th> Photo </th>
                                                    <th> Marriage Status </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset2 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset2['user_id']; ?></td>
                                                    <td><?php echo $row_Recordset2['mname']; ?></td>
                                                    <td><?php echo $row_Recordset2['email']; ?></td>
                                                    <td><?php echo $row_Recordset2['mobile']; ?></td>
                                                    <td><?php echo $row_Recordset2['gender']; ?></td>
                                                    <td><?php echo date('d M Y',strtotime($row_Recordset2['dob'])); ?>
                                                    </td>
                                                    <td><?php echo $row_Recordset2['age']; ?></td>
                                                    <td><?php echo $row_Recordset2['mothertongue']; ?></td>
                                                    <td><?php echo $row_Recordset2['religion']; ?></td>
                                                    <td><?php echo $row_Recordset2['caste']; ?></td>
                                                    <td><?php echo $row_Recordset2['occupation']; ?></td>
                                                    <td><?php echo $row_Recordset2['income']; ?></td>
                                                    <td><?php echo $row_Recordset2['education']; ?></td>
                                                    <td><?php echo $row_Recordset2['country']; ?></td>
                                                    <td><?php echo $row_Recordset2['state']; ?></td>
                                                    <td><?php echo $row_Recordset2['city']; ?></td>
                                                    <td><?php echo $row_Recordset2['fathername']; ?></td>
                                                    <td><?php echo $row_Recordset2['mothername']; ?></td>
                                                    <td><?php echo $row_Recordset2['brothers']; ?></td>
                                                    <td><?php echo $row_Recordset2['sisters']; ?></td>
                                                    <td> <?php
                                                                $photo = $row_Recordset2['photo'];
                                                                if (!empty($photo)) {
                                                                    echo '<a href="../images/profiles/' . $photo . '" target="_blank"><img src="../images/profiles/' . $photo . '"></a>';
                                                                } else {
                                                                    echo '<a href="../images/profiles/dummy-profile.png" target="_blank"><img src="../images/profiles/dummy-profile.png"></a>';
                                                                }
                                                                ?>
                                                    <td><?php echo $row_Recordset2['marriage_status']; ?></td>
                                                    <td><a href="../admin-profile.php?user_id=<?php echo $row_Recordset2['user_id']; ?>"
                                                            target="_blank"><i
                                                                class="mdi mdi-share menu-icon"></i></a>&nbsp;<a
                                                            href="edit_user.php?user_id=<?php echo $row_Recordset2['user_id']; ?>"><i
                                                                class="mdi mdi-pencil menu-icon"></i></a>
                                                        <a
                                                            href="delete_user.php?user_id=<?php echo $row_Recordset2['user_id']; ?>"><i
                                                                class="mdi mdi-trash-can menu-icon"></i></a>
                                                    </td>
                                                </tr>
                                                <?php }while($row_Recordset2 = mysqli_fetch_assoc($Recordset2));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between"> <span
                            class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyrights &copy;
                            2024 The Wedding Matrimony. All Rights Reserved </span></div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <script>
    new DataTable('#example');
    </script>
</body>

</html>