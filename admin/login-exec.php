<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php
//Start session
session_start();

$login_fail = 'Username or Password not found';

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//Function to sanitize values received from the form. Prevents SQL injection
function clean( $str ) {
    $str = @trim( $str );
    global $theweddingmatrimony;
    return mysqli_real_escape_string( $theweddingmatrimony, $str );
}

//Sanitize the POST values
$login = clean( $_POST[ 'uname' ] );
$password = clean( $_POST[ 'password' ] );

//Input Validations
if ( $login == '' ) {
    $errmsg_arr[] = 'Username Missing';
    $errflag = true;
}
if ( $password == '' ) {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

//If there are input validations, redirect back to the login form
if ( $errflag ) {
    $_SESSION[ 'ERRMSG_ARR' ] = $errmsg_arr;
    session_write_close();
    header( "location: login.php" );
    exit();
}

//Create query
$qry = "SELECT uname, role, password FROM `admin` WHERE uname='$login'";
$result = mysqli_query( $theweddingmatrimony, $qry );
$row = mysqli_fetch_assoc( $result );
//Check whether the query was successful or not
if ( $result ) {
    if ( mysqli_num_rows( $result ) == 1 ) {
        $hash = $row[ 'password' ];
        if ( password_verify( $password, $hash ) ) {
            //Login Successful
            session_regenerate_id();
            $_SESSION[ 'uname' ] = $row[ 'uname' ];
            $_SESSION[ 'role' ] = $row[ 'role' ];
            session_write_close();
            header( "location: home.php" );
            exit();
        } else {
            //Login failed
            $_SESSION[ 'login_fail' ] = $login_fail;
            session_write_close();
            header( "location: index.php" );
            exit();
        }
    } else {
        //Login failed
        $_SESSION[ 'login_fail' ] = $login_fail;
        session_write_close();
        header( "location: index.php" );
        exit();
    }
} else {
    die( "Query failed" );
}
?>