<?php require_once('Connections/theweddingmatrimony.php'); ?>

<?php

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
  $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}
$today = date( 'Y-m-d' );
$erroremail = $errorpass1 = $errorpass2 = $errorpass = $errorgender = $errormob = $errormob2 = $errorname = $errortc = "";
mysqli_select_db( $theweddingmatrimony, $database_theweddingmatrimony );

if ( ( isset( $_POST[ "MM_insert" ] ) ) && ( $_POST[ "MM_insert" ] == "form1" ) ) {
  $email = $_POST[ 'email' ];
  $query_Recordset1 = "SELECT email FROM user WHERE email = '$email'";
  $Recordset1 = mysqli_query( $theweddingmatrimony, $query_Recordset1 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset1 = mysqli_fetch_assoc( $Recordset1 );
  $totalRows_Recordset1 = mysqli_num_rows( $Recordset1 );

  if ( !empty( $email ) && ( !preg_match( '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i', $email ) ) )
    $erroremail = "Invalid Email Id. Please enter valid email id";
  else if ( !empty( $totalRows_Recordset1 > 0 ) )
    $erroremail = "Email Id already in use. Please choose a different email id";
  else {
    if ( empty( $_POST[ 'password' ] ) )
      $errorpass1 = "Please Enter Password";
    if ( empty( $_POST[ 'mname' ] ) )
      $errorname = "Please enter your name";
    if ( empty( $_POST[ 'mobile' ] ) )
      $errormob = "Please Enter mobile number";
    if ( !empty( $_POST[ 'mobile' ] ) && !is_numeric( $_POST[ 'mobile' ] ) )
      $errormob2 = "Mobile number must be in digits";
    if ( empty( $_POST[ 'gender' ] ) )
      $errgender= "Please select gender";
    if ( ( !isset( $_POST[ 'tc' ] ) ) )
      $errortc = "Please accept our terms &amp; condition";
  }
  if ( empty( $erroremail ) && empty( $errormob1 ) && empty( $errorname ) && empty( $errorgender) && empty( $errortc ) ) {

    $password = $_POST[ 'password' ];
    $hash = password_hash( $password, PASSWORD_DEFAULT );

    $insertSQL = sprintf( "INSERT INTO user (email, password, mname, mobile, gender) VALUES (%s, '$hash', %s, %s, %s)",
      GetSQLValueString( $_POST[ 'email' ], "text" ),
      GetSQLValueString( $_POST[ 'mname' ], "text" ),
      GetSQLValueString( $_POST[ 'mobile' ], "text" ),
      GetSQLValueString( $_POST[ 'gender' ], "text" ) );

    $Result1 = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );
    }

    $insertGoTo = "user-dashboard.php?success=yes";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
      $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
      $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $insertGoTo ) );
  }

?>
<!doctype html>
<html lang="en">

<head>
    <title>The Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="images/loder/1.png" alt="" loading="lazy"></span>
            <span class="lod2"><img src="images/loder/2.png" alt="" loading="lazy"></span>
            <span class="lod3"><img src="images/loder/3.png" alt="" loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->

    <?php include('header.php'); ?>

    <!-- REGISTER -->
    <section>
        <div class="login">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <h4>Start for free</h4>
                                    <h1>Sign up to Matrimony</h1>
                                    <p>Already a member? <a href="login.php">Login</a></p>
                                </div>
                                <div class="form-login">
                                    <form id="form1" name="form1" action="<?php echo $editFormAction; ?>" method="POST"
                                        class="form" role="form">
                                        <div class="form-group">
                                            <label>Name:<span
                                                    class="text-danger">*<?php echo $errorname ?></span></label>
                                            <input type="text" class="form-control" placeholder="Enter your full name"
                                                name="mname" <?php if(isset($_POST['mname'])) {?>
                                                value="<?php echo $_POST['mname'];} ?>">
                                            <?php echo $errorname; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:<span
                                                    class="text-danger">*<?php echo $erroremail ?></span></label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email"
                                                <?php if(isset($_POST['email'])) {?>
                                                value="<?php echo $_POST['email'];} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile:<span
                                                    class="text-danger">*<?php echo $errormob . $errormob2 ?></span></label>
                                            <input type="number" class="form-control" id="mobile"
                                                placeholder="Enter phone number" name="mobile"
                                                <?php if(isset($_POST['mobile'])) {?>
                                                value="<?php echo $_POST['mobile'];} ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:<span
                                                    class="text-danger">*<?php echo $errorgender ?></span></label>
                                            <select class="form-control chosen-select" name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male"
                                                    <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Man') echo 'selected'; ?>>
                                                    Man</option>
                                                <option value="Female"
                                                    <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Woman') echo 'selected'; ?>>
                                                    Woman</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:<span
                                                    class="text-danger">*<?php echo $errorpass1 ?></span></label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password" name="password">
                                        </div>
                                        <div class="form-group form-check"><span
                                                class="text-danger"><?php echo $errortc ?></span>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="tc" name="tc">
                                                Creating
                                                an account means you’re okay with our <a href="#!">Terms of Service</a>,
                                                Privacy Policy, and our default Notification Settings.
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                        <input type="hidden" name="MM_insert" value="form1">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <?php include('footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>