<?php
//Start session
session_start();
$loginflag = 0;
//Check whether the session variable SESS_MEMBER_ID is present or not
if ( !isset( $_SESSION[ 'uname' ] ) || ( trim( $_SESSION[ 'uname' ] ) == '' ) ) {
    $loginflag = 1;
}
if ( $loginflag == 1 ) {
    header( "location: index.php" );
}
$today = date( 'Y-m-d' );
$role = $_SESSION['role'];

$query_Recordset1 = "SELECT * FROM admin WHERE uname = '{$_SESSION['uname']}'";
$Recordset1 = mysqli_query( $theweddingmatrimony, $query_Recordset1 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset1 = mysqli_fetch_assoc( $Recordset1 );
$totalRows_Recordset1 = mysqli_num_rows( $Recordset1 );

function dateformat( $datevar ) {
    $date = str_replace( '/', '-', $datevar );
    $changed_format = date( 'Y-m-d', strtotime( $date ) );
    return ( $changed_format );
}

function dateconvert( $dateymd ) {
    $converted = date( "d F Y", strtotime( $dateymd ) );
    return ( $converted );
}
?>