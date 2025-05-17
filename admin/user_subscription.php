<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}
if ( ( isset( $_POST[ "MM_insert" ] ) ) && ( $_POST[ "MM_insert" ] == "form1" ) ) {
    $user_id = $_POST['user_id'];
    $subscription_type = $_POST['subscription_type'];
    $subsdate = date('Y-m-d', strtotime($_POST['subsdate']));
    $allowedprofiles = 0;

    switch ($subscription_type) {
        case 'Free':
            $days_to_add = 12 * 30; 
            $allowedprofiles = 5;
            break;
        case 'Bronze':
            $days_to_add = 3 * 30; 
            $allowedprofiles = 25;
            break;
        case 'Silver':
            $days_to_add = 6 * 30; 
            $allowedprofiles = 50;
            break;
        case 'Gold':
            $days_to_add = 9 * 30; 
            $allowedprofiles = 70;
            break;
        case 'Diamond':
            $days_to_add = 12 * 30; 
            $allowedprofiles = 100;
            break;
        case 'Platinum':
            $days_to_add = 12 * 30;
            $allowedprofiles = 200;
            break;
        case 'Custom':
            $days_to_add = 12 * 30; 
            $allowedprofiles = isset($_POST['custom_profiles']) ? intval($_POST['custom_profiles']) : 0;
            break;
        default:
            die('Invalid subscription type.');
    }

    $subedate = date('Y-m-d', strtotime($subsdate . " + $days_to_add days"));
    
    $insertSQL = sprintf("INSERT INTO `subscription` (`user_id`, `subscription_type`, `subsdate`, `subedate`, `allowedprofiles`) VALUES (%s, %s, %s, %s, %s)",
        GetSQLValueString($user_id, "text"),
        GetSQLValueString($subscription_type, "text"),
        GetSQLValueString($subsdate, "text"),
        GetSQLValueString($subedate, "text"),
        GetSQLValueString($allowedprofiles, "int") );

    $Result = mysqli_query($theweddingmatrimony, $insertSQL) or die(mysqli_error($theweddingmatrimony));

    $query_Recordset2 = "SELECT * FROM `subscription` ORDER BY subscription_id DESC LIMIT 1";
    $Recordset2 = mysqli_query($theweddingmatrimony, $query_Recordset2) or die(mysqli_error($theweddingmatrimony));
    $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
    $totalRows_Recordset2 = mysqli_num_rows($Recordset2);

    $insertSQL = sprintf("INSERT INTO `payment` (`user_id`, `subscription_id`, `amount`, `paymentdate`) VALUES (%s, %s, %s, NOW())",
        GetSQLValueString($user_id, "text"),
        GetSQLValueString($row_Recordset2['subscription_id'], "text"),
        GetSQLValueString($_POST['amount'], "int") );
    
    $Result = mysqli_query($theweddingmatrimony, $insertSQL) or die(mysqli_error($theweddingmatrimony));

    header('Location: edit_user.php?user_id=' . $user_id . '&success=Payment Added');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Payment | The Wedding Matrimony</title>
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
                                    class="mdi mdi-office"></i> </span> Add Payment </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 mb-1"> <a href="user.php">
                                                <button type="button"
                                                    class="btn btn-gradient-primary btn-rounded btn-fw"><i
                                                        class="mdi mdi-arrow-left menu-icon"></i> &nbsp;Back</button>
                                            </a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
        if ( isset( $_GET[ 'success' ] ) ) {
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-success">Payment ' . $_GET[ 'success' ] . ' Successfully</div>';
            echo '</div>';
        }
        ?>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" name="form1" role="form"
                                        action="<?php echo $editFormAction; ?>">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="lb">Amount:</label>
                                                <input type="text" class="form-control" name="amount" required
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                                    placeholder="Enter Amount">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="lb">Subscription Type:</label>
                                                <select class="form-select chosen-select" name="subscription_type"
                                                    id="subscription_type" required>
                                                    <option value="" disabled selected>Select Subscription Type</option>
                                                    <option value="Free">Free</option>
                                                    <option value="Bronze">Bronze</option>
                                                    <option value="Silver">Silver</option>
                                                    <option value="Gold">Gold</option>
                                                    <option value="Diamond">Diamond</option>
                                                    <option value="Platinum">Platinum</option>
                                                    <option value="Custom">Custom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="custom_profiles_div" style="display: none;">
                                            <div class="col-12 form-group">
                                                <label class="lb">Custom Profile Views:</label>
                                                <input type="number" class="form-control" name="custom_profiles"
                                                    id="custom_profiles" min="1"
                                                    placeholder="Enter number of allowed profile views">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label class="lb">Start Date:</label>
                                                <input type="date" class="form-control" name="subsdate" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary mt-4">Save</button>
                                        <input type="hidden" name="MM_insert" value="form1">
                                        <input type="hidden" name="user_id"
                                            value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">
                                    </form>
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
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
    <script>
    document.getElementById('subscription_type').addEventListener('change', function() {
        var customDiv = document.getElementById('custom_profiles_div');
        var customInput = document.getElementById('custom_profiles');

        if (this.value === 'Custom') {
            customDiv.style.display = 'block';
            customInput.required = true;
        } else {
            customDiv.style.display = 'none';
            customInput.required = false;
        }
    });
    </script>
</body>

</html>