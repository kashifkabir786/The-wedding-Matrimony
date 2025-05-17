<?php require_once('Connections/theweddingmatrimony.php'); ?>

<?php
	//Start session
	session_start();
	
	$login_fail='email or Password not found';
		
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Select database
	//mysqli_select_db($datamine, $database_datamine);
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		global $theweddingmatrimony;
		
		return mysqli_real_escape_string($theweddingmatrimony, $str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['email']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
	
	//Create query
	$qry = "SELECT email, password FROM `user` WHERE email='$login'";
	$result = mysqli_query($theweddingmatrimony, $qry);
	$row = mysqli_fetch_assoc($result);

if ($result) {
    if (mysqli_num_rows($result) == 1) {
        $hash = $row['password'];
        if (password_verify($password, $hash)) {
            // Login Successful
            session_regenerate_id();
            $_SESSION['email'] = $row['email'];
            session_write_close();
            header("location: alluser.php");
            exit();
        } else {
            // Login failed
            $_SESSION['login_fail'] = $login_fail;
            session_write_close();
            header("location: login.php");
            exit();
        }
    } else {
        // Login failed
        $_SESSION['login_fail'] = $login_fail;
        session_write_close();
        header("location: login.php");
        exit();
    }
} else {
    die("Query failed");
}


?>