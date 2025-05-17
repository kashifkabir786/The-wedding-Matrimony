<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$flag = false;
if ( isset( $_GET[ 'uname' ] ) ) {
    $uname = $_GET[ 'uname' ];

    $query_Recordset2 = "SELECT * FROM `admin` WHERE uname = '$uname'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $flag = true;
}
    
if ( isset( $_GET[ 'success' ] ) && $_GET[ 'success' ] == "Added" ) {
    $query_Recordset2 = "SELECT * FROM `admin` ORDER BY uname DESC LIMIT 1";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $uname = $row_Recordset2[ 'uname' ];
    $flag = true;
}

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}
$errfname = $errlname = $erruname = $errpass1 = $errpass2 = $errpass = "";
//updating project
if ( ( isset( $_POST[ "MM_insert" ] ) ) && ( $_POST[ "MM_insert" ] == "form1" ) ) {
  //validate username
  $query_Recordset2 = "SELECT uname FROM `admin` WHERE uname = '{$_POST['uname']}'";
  $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
  $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

 if ($totalRows_Recordset2 > 0)
  $erruname = "Username already exists";
    if (empty($_POST['fname']))  
    $errfname = "Please Enter First Name";
    if (empty($_POST['lname']))  
    $errlname = "Please Enter Last Name";
    if (empty($_POST['uname'])) 
    $erruname = "Please Enter Username";
    else if ($totalRows_Recordset2 > 0)
    $erruname = "Username already exists";
    if ( empty( $_POST[ 'password' ] ) )
        $errpass1 = "Please Enter Password";
    if ( empty( $_POST[ 'rpassword' ] ) )
        $errpass2 = "Please Retype Password";
    if ( $_POST[ 'password' ] != $_POST[ 'rpassword' ] )
        $errpass = "Passwords Dont Match";
    if ( empty( $errfname ) && empty( $errlname ) && empty( $erruname ) && empty( $errpass1 ) && empty( $errpass2 ) && empty( $errpass ) ) {
    $password = $_POST[ 'password' ];
    $hash = password_hash( $password, PASSWORD_DEFAULT );
    $insertSQL = sprintf( "INSERT INTO admin (uname, password, fname, lname, role) VALUES (%s, '$hash', %s, %s, %s)",
      GetSQLValueString( $_POST[ 'uname' ], "text" ),
      GetSQLValueString( $_POST[ 'fname' ], "text" ),
      GetSQLValueString( $_POST[ 'lname' ], "text" ),
      GetSQLValueString( $_POST[ 'role' ], "text" ) );
    $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

    $insertGoTo = "add_staff.php?success=Added";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
      $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
      $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $insertGoTo ) );
  }
}

//updating customer
if ( ( isset( $_POST[ "MM_update" ] ) ) && ( $_POST[ "MM_update" ] == "form1" ) ) {

  $updateSQL = sprintf( "UPDATE `admin` SET `fname`=%s, `lname`=%s WHERE uname = %s",
    GetSQLValueString( $_POST[ 'fname' ], "text" ),
    GetSQLValueString( $_POST[ 'lname' ], "text" ),
    GetSQLValueString( $_POST[ 'uname' ], "text" ) );
  $Result = mysqli_query( $theweddingmatrimony, $updateSQL )or die( mysqli_error( $theweddingmatrimony ) );

  $insertGoTo = "add_staff.php?success=Updated";
  if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
    $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
  }
  header( sprintf( "Location: %s", $insertGoTo ) );
}

if ((isset($_POST["MM_password"])) && ($_POST["MM_password"] == "form2")) {
    if (empty($_POST['password']))
        $errpass1 = "Please Enter Password";
    if (empty($_POST['rpassword']))
        $errpass2 = "Please Retype Password";
    if ($_POST['password'] != $_POST['rpassword'])
        $errpass = "Passwords Don't Match";
        
    if (empty($errpass1) && empty($errpass2) && empty($errpass)) {
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $updateSQL = sprintf("UPDATE admin SET password='%s' WHERE uname=%s",
            $hash,
            GetSQLValueString($_POST['uname'], "text"));
        
        $Result = mysqli_query($theweddingmatrimony, $updateSQL) or die(mysqli_error($theweddingmatrimony));

        $insertGoTo = "add_staff.php?success=Password Updated";
        if (isset($_SERVER['QUERY_STRING'])) {
            $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
            $insertGoTo .= $_SERVER['QUERY_STRING'];
        }
        header(sprintf("Location: %s", $insertGoTo));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User | The Wedding Matrimony</title>
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
                                    class="mdi mdi-office"></i> </span> Edit User </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 mb-1"> <a href="staff.php">
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
            echo '<div class="alert alert-success">Staff ' . $_GET[ 'success' ] . ' Successfully</div>';
            echo '</div>';
        }
        ?>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" name="form1" role="form" action="<?php echo $editFormAction;?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="fname">First Name:<span class="text-warning">*
                                                            <?php echo $errfname; ?></span></label>
                                                    <input type="text" class="form-control" name="fname"
                                                        value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; elseif ($flag) echo $row_Recordset2['fname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="lname">Last Name:<span class="text-warning">*
                                                            <?php echo $errlname; ?></span></label>
                                                    <input type="text" class="form-control" name="lname"
                                                        value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; elseif ($flag) echo $row_Recordset2['lname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="uname">User Name:<span class="text-warning">*
                                                            <?php echo $erruname; ?></span></label>
                                                    <input type="text" class="form-control" name="uname"
                                                        value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; elseif ($flag) echo $row_Recordset2['uname']; ?>">
                                                </div>
                                            </div>
                                            <?php if(!$flag){ ?>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password">Password:<span class="text-warning">*
                                                            <?php echo $errpass1; ?></span></label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <?php if(!$flag){ ?>
                                                    <label for="rpassword">Repeat Password:<span class="text-warning">*
                                                            <?php echo $errpass2 . $errpass; ?></span></label>
                                                    <input type="password" class="form-control" name="rpassword">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary mt-4">Save</button>
                                        <?php
                                        if ( $flag ) {
                                        ?>
                                        <input type="hidden" name="MM_update" value="form1">
                                        <input type="hidden" name="uname" value="<?php echo $uname; ?>">
                                        <?php } else { ?>
                                        <input type="hidden" name="MM_insert" value="form1">
                                        <input type="hidden" name="role" value="Staff">
                                        <?php } ?>
                                    </form>
                                    <?php if($flag){ ?>
                                    <hr class="mt-4" />
                                    <h4 class="card-title">Update Password</h4>
                                    <form method="POST" name="form2" role="form" action="<?php echo $editFormAction;?>">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password">Password:<span class="text-warning">*
                                                            <?php echo $errpass1; ?></span></label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="rpassword">Repeat Password:<span class="text-warning">*
                                                            <?php echo $errpass2 . $errpass; ?></span></label>
                                                    <input type="password" class="form-control" name="rpassword">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary active" role="button"
                                            aria-pressed="true">SAVE</button>
                                        <input type="hidden" name="MM_password" value="form2">
                                        <input type="hidden" name="uname" value="<?php echo $uname; ?>">
                                    </form>
                                    <?php } ?>
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
</body>

</html>