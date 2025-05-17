<?php
session_start();
$flag = false;
if ( isset( $_GET[ 'page' ] ) && isset( $_GET[ 'id' ] ) ) {
  unset( $_SESSION[ 'uname' ] );
  unset( $_SESSION[ 'ERRMSG_ARR' ] );
  unset( $_SESSION[ 'login_fail' ] );

  $flag = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log In | The wedding matrimony</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <style>
    body {
        background-color: #F2EDF3;
    }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <div class="row">
            <div class="offset-md-3 col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"><img src="../images/logo1.png" width="60%" alt="">
                        </div>
                        <?php
          if ( isset( $_SESSION[ 'ERRMSG_ARR' ] ) ) {
            foreach ( $_SESSION[ 'ERRMSG_ARR' ] as $alert ) {
              echo "<p class='text-danger'>$alert</p>\n";
            }
          }
          ?>
                        <?php
          if ( isset( $_SESSION[ 'login_fail' ] ) ) {
            $alert = $_SESSION[ 'login_fail' ];
            echo "<p class='text-danger'>$alert</p>\n";
          }
          ?>
                        <?php
          if ( isset( $_GET[ 'sucess' ] ) && $_GET[ 'sucess' ] == "yes" )
            echo '<p class="text-success">Your passowrd is successfully changed. Login with your new password</p>';
          ?>
                        <form name="form1" action="login-exec.php" method="post" class="mt-4">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="uname" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-flat mt-4 text-center">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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