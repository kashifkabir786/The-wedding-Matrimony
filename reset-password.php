<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php
session_start();

date_default_timezone_set('Asia/Kolkata');

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}

if(!isset($_GET['token'])) {
    header("Location: login.php");
    exit();
}

$token = $_GET['token'];
$query = "SELECT * FROM user WHERE reset_token = '$token' AND token_expiry > NOW()";
$result = mysqli_query($theweddingmatrimony, $query);

$error_msg = "";
$flag = false;

if(mysqli_num_rows($result) == 0) {
    $error_msg = "Invalid or expired reset link";
}

if(isset($_POST['submit'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($password != $confirm_password) {
        $error_msg = "Passwords do not match";
    } else {
        $password = $_POST[ 'password' ];
        $hash = password_hash( $password, PASSWORD_DEFAULT );

        $update_query = "UPDATE user SET password = '$hash', reset_token = NULL, token_expiry = NULL WHERE reset_token = '$token'";
        mysqli_query($theweddingmatrimony, $update_query);
        
        $flag = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Reset Password - The Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!-- MOBILE MENU -->
    <?php include('header.php'); ?>
    <!--END HEADER SECTION-->

    <section>
        <div class="login">
            <div class="container">
                <div class="row">

                    <div class="inn">
                        <div class="lhs">
                            <div class="tit">
                                <h2>Now <b>Find <br> your life partner</b> Easy and fast.</h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs">
                            <div>
                                <div class="form-tit">
                                    <?php
                                    if($error_msg != "") {
                                        echo "<h4 class='text-danger'>" . $error_msg . "</h4>";
                                    }
                                    ?>
                                    <h1>Reset Password</h1>
                                    <p>Create your new password to access your account.</p>
                                    <h4>New Password</h4>
                                    <?php
                                    if($error_msg != "") {
                                        echo "<p class='text-danger'>" . $error_msg . "</p>";
                                    }
                                    ?>
                                </div>
                                <?php
                                if($flag == false) {
                                ?>
                                <div class="form-login">
                                    <form action="<?php echo $editFormAction; ?>" method="post">
                                    <div class="form-group">
                                            <label>New Password:</label>
                                            <input type="password" class="form-control" name="password" 
                                                placeholder="Enter new password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" class="form-control" name="confirm_password" 
                                                placeholder="Confirm new password" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                                    </form>
                                </div>
                                <?php
                                    } else {
                                        echo "<h4 class='text-success'>Password has been reset successfully</h4>";
                                        echo "<p>You can now <a href='login.php'>login</a> to your account.</p>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--FOOTER SECTION-->
    <?php include('footer.php'); ?>
    <!--END FOOTER SECTION-->

    <!--ALL SCRIPT FILES-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>
</html> 