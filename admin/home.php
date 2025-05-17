<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$query_Recordset2 = "SELECT (SELECT COUNT(user_id) FROM user) AS total_user, (SELECT COUNT(payment_id) FROM payment) AS total_payment";
$Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

$query_Recordset5 = "SELECT (SELECT COUNT(subscription_id) FROM subscription) AS total_subscription";
$Recordset5 = mysqli_query( $theweddingmatrimony, $query_Recordset5 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset5 = mysqli_fetch_assoc( $Recordset5 );
$totalRows_Recordset5 = mysqli_num_rows( $Recordset5 );

$query_Recordset3 = "SELECT A.*, B.* FROM `payment` AS A INNER JOIN user AS B ON A.user_id = B.user_id ORDER BY payment_id DESC LIMIT 10";
$Recordset3 = mysqli_query( $theweddingmatrimony, $query_Recordset3 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
$totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );

$query_Recordset4 = "SELECT A.*, B.* FROM `subscription` AS A INNER JOIN user AS B ON A.user_id = B.user_id ORDER BY subscription_id DESC LIMIT 10";
$Recordset4 = mysqli_query( $theweddingmatrimony, $query_Recordset4 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset4 = mysqli_fetch_assoc( $Recordset4 );
$totalRows_Recordset4 = mysqli_num_rows( $Recordset4 );

$query_Recordset6 = "SELECT * FROM `user` ORDER BY user_id DESC LIMIT 10";
$Recordset6 = mysqli_query( $theweddingmatrimony, $query_Recordset6 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset6 = mysqli_fetch_assoc( $Recordset6 );
$totalRows_Recordset6 = mysqli_num_rows( $Recordset6 );

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | The Wedding Matrimony</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
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
                        style="width: auto; height: 50px;" /></a>
            </div>
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
                                    class="mdi mdi-home"></i> </span> Dashboard </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"> <span></span>Overview <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body"> <img src="assets/images/dashboard/circle.svg"
                                        class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">No of User</h4>
                                    <h1 class="mb-5"><?php echo $row_Recordset2['total_user'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body"> <img src="assets/images/dashboard/circle.svg"
                                        class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">No of Payment</h4>
                                    <h1 class="mb-5"><?php echo $row_Recordset2['total_payment'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body"> <img src="assets/images/dashboard/circle.svg"
                                        class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">No of Subscription</h4>
                                    <h1 class="mb-5"><?php echo $row_Recordset5['total_subscription'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--		  customers-->
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Payment</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Payment Id </th>
                                                    <th> User Name </th>
                                                    <th> Subscription Id </th>
                                                    <th> Amount </th>
                                                    <th> Payment Date </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset3 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset3['payment_id'] ?></td>
                                                    <td><?php echo $row_Recordset3['mname'] ?></td>
                                                    <td><?php echo $row_Recordset3['subscription_id'] ?></td>
                                                    <td><?php echo $row_Recordset3['amount'] ?></td>
                                                    <td><?php echo date('d M Y',strtotime($row_Recordset3['paymentdate'])); ?>
                                                    </td>
                                                </tr>
                                                <?php }while($row_Recordset3 = mysqli_fetch_assoc($Recordset3));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--payment-->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Subscription</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Subscription Id </th>
                                                    <th> User Name </th>
                                                    <th> Subscription Type </th>
                                                    <th> Subscription Start Date </th>
                                                    <th> Subscription End Date </th>
                                                    <th> Status </th>
                                                    <th> Allowed Profiles </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset4 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset4['subscription_id']; ?></td>
                                                    <td><?php echo $row_Recordset4['mname']; ?></td>
                                                    <td><?php echo $row_Recordset4['subscription_type']; ?></td>
                                                    <td><?php echo date('d M Y',strtotime($row_Recordset4['subsdate'])); ?>
                                                    </td>
                                                    <td><?php echo date('d M Y',strtotime($row_Recordset4['subedate'])); ?>
                                                    </td>
                                                    <td><?php echo $row_Recordset4['status']; ?>
                                                    </td>
                                                    <td><?php echo $row_Recordset4['allowedprofiles']; ?></td>
                                                </tr>
                                                <?php }while($row_Recordset4 = mysqli_fetch_assoc($Recordset4));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--payment-->
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent User</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> User Id </th>
                                                    <th> Full Name </th>
                                                    <th> Email </th>
                                                    <th> Mobile No </th>
                                                    <th> Gender </th>
                                                    <th> Age </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                      if ( $totalRows_Recordset6 > 0 ) {
                          do {
                              ?>
                                                <tr>
                                                    <td><?php echo $row_Recordset6['user_id'] ?></td>
                                                    <td><?php echo $row_Recordset6['mname'] ?></td>
                                                    <td><?php echo $row_Recordset6['email'] ?></td>
                                                    <td><?php echo $row_Recordset6['mobile'] ?></td>
                                                    <td><?php echo $row_Recordset6['gender'] ?></td>
                                                    <td><?php echo $row_Recordset6['age'] ?></td>
                                                </tr>
                                                <?php }while($row_Recordset6 = mysqli_fetch_assoc($Recordset6));} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between"> <span
                            class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyrights &copy;
                            2024 The Wedding Matrimony. All Rights Reserved </span></div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
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
</body>

</html>