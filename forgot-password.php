<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
require 'vendor/autoload.php';
require 'includes/mail_config.php';

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($theweddingmatrimony, $query);
    
    if(mysqli_num_rows($result) > 0) {
        if (function_exists('openssl_random_pseudo_bytes')) {
            $token = bin2hex(openssl_random_pseudo_bytes(16)); // Generates a 32-character token
        } else {
            // Fallback for very old PHP versions
            $token = md5(uniqid(rand(), true));
        }
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $update_query = "UPDATE user SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email'";
        mysqli_query($theweddingmatrimony, $update_query);
        
        $reset_link = "https://theweddingsindia.com/reset-password.php?token=" . $token;
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: " . $reset_link;
        $headers = "From: noreply@theweddingmatrimony.com";
        
        $mail = new PHPMailer(true);
        try {
            // Debug mode ON - आप लाइव पर इसे हटा सकते हैं
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'vps.xwaydesigns.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USERNAME;
            $mail->Password   = SMTP_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = SMTP_PORT;
        
            // Recipients
            $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
            $mail->addAddress($email); // यहाँ अपना ईमेल डालें टेस्टिंग के लिए
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Your Password - The Wedding Matrimony';
            $mail->Body = '
            <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
                <div style="background-color: #f6af04; padding: 20px; text-align: center;">
                    <h1 style="color: #ffffff;">Password Reset Request</h1>
                </div>
                <div style="padding: 20px; border: 1px solid #ddd;">
                    <p>Dear member,</p>
                    <p>We received a request to reset your password. Click the button below to create a new password:</p>
                    <p style="text-align: center;">
                        <a href="' . $reset_link . '" 
                        style="background-color: #f6af04; 
                                color: #ffffff; 
                                padding: 12px 25px; 
                                text-decoration: none; 
                                border-radius: 5px; 
                                display: inline-block;">
                            Reset Password
                        </a>
                    </p>
                    <p>If you did not request this password reset, please ignore this email.</p>
                    <p>This link will expire in 1 hour for security reasons.</p>
                    <p>Best regards,<br>The Wedding Matrimony Team</p>
                </div>
            </div>';
        
            $mail->send();
            $_SESSION['success_msg'] = "Password reset link has been sent to your email";
        } catch (Exception $e) {
            $_SESSION['error_msg'] = "Failed to send password reset link: " . $mail->ErrorInfo;
        } 
    } else {
        $_SESSION['error_msg'] = "Email address not found";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Forgot Password - The Wedding Matrimony</title>
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
                                    <h1>Forgot Password</h1>
                                    <p>Enter your registered email address to receive password reset instructions.</p>
                                </div>
                                <?php
                                    if(isset($_SESSION['error_msg'])) {
                                        echo "<p class='text-danger'>" . $_SESSION['error_msg'] . "</p>";
                                        unset($_SESSION['error_msg']);
                                    }
                                    if(isset($_SESSION['success_msg'])) {
                                        echo "<p class='text-success'>" . $_SESSION['success_msg'] . "</p>";
                                        unset($_SESSION['success_msg']);
                                    }
                                    ?>
                                <div class="form-login">
                                    <form action="<?php echo $editFormAction; ?>" method="post">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" 
                                                placeholder="Enter your registered email" required>
                                        </div>
                                        <div class="text-end mb-3">
                                            Remember password? <a href="login.php" class="text-primary">Login here</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Send Reset Link</button>
                                    </form>
                                </div>
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