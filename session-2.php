<?php
//Start session
session_start();
$loginflag = 0;
//Check whether the session variable SESS_MEMBER_ID is present or not
if ( !isset( $_SESSION[ 'email' ] ) || ( trim( $_SESSION[ 'email' ] ) == '' ) ) {
    $loginflag = 1;
}
if ( $loginflag != 1 ) {
date_default_timezone_set( 'Asia/Kolkata' );
$today = date( 'Y-m-d' );

$query_Recordset1 = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
$Recordset1 = mysqli_query( $theweddingmatrimony, $query_Recordset1 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset1 = mysqli_fetch_assoc( $Recordset1 );
$totalRows_Recordset1 = mysqli_num_rows( $Recordset1 );

$query_Recordset = "SELECT * FROM subscription WHERE user_id = '{$row_Recordset1['user_id']}' AND status = 'Active' ORDER BY subscription_id DESC LIMIT 1";
$Recordset = mysqli_query( $theweddingmatrimony, $query_Recordset )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset = mysqli_fetch_assoc( $Recordset );
$totalRows_Recordset = mysqli_num_rows( $Recordset );

$profileviews = false;

if ($totalRows_Recordset > 0) {
    $subscription_type = $row_Recordset['subscription_type'];
    $allowedprofiles = $row_Recordset['allowedprofiles'];
    if (!empty($row_Recordset['subsdate']) && !empty($row_Recordset['subedate'])) {
   $subsdate = new DateTime($row_Recordset['subsdate']);
    $subedate = new DateTime($row_Recordset['subedate']);
    $subsdate_formatted = $subsdate->format('M Y');
    $subedate_formatted = $subedate->format('M Y');
    $interval = $subsdate->diff($subedate);
    $months = ($interval->y * 12) + $interval->m + ($interval->d > 0 ? 1 : 0);
    $subsdate = new DateTime($row_Recordset['subsdate']);
    $subedate = new DateTime($row_Recordset['subedate']);
    $todaydate = new DateTime();


    if ($todaydate > $subedate) {
       $update_query = "UPDATE subscription SET status = 'Expired' WHERE user_id = '{$row_Recordset1['user_id']}'";
       $Result = mysqli_query($theweddingmatrimony, $update_query) or die(mysqli_error($theweddingmatrimony));
    } else {
        $profileviews = true;
    }
}
}

function dateformat( $datevar ) {
    $date = str_replace( '/', '-', $datevar );
    $changed_format = date( 'Y-m-d', strtotime( $date ) );
    return ( $changed_format );
}

function dateconvert( $dateymd ) {
    $converted = date( "d F Y", strtotime( $dateymd ) );
    return ( $converted );
}
}
?>