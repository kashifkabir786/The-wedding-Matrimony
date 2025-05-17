<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>

<?php

if(isset($_POST['submit'])){
    $submit = $_POST['submit'];

if(isset($row_Recordset1['user_id']) && ($_POST['subscription_type'])){
    $user_id = $row_Recordset1['user_id'];
    $subscription_type = $_POST['subscription_type'];
}

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}

$subsdate = date('Y-m-d');
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
    default:
        die('Invalid subscription type.');
}

$subedate = date('Y-m-d', strtotime($subsdate . " + $days_to_add days"));
 
$insertSQL = sprintf( "INSERT INTO `subscription`(`user_id`, `subscription_type`, `subsdate`, `subedate`, `allowedprofiles`) VALUES (%s, %s, %s, %s, %s)",
    GetSQLValueString( $user_id, "text" ),
    GetSQLValueString( $subscription_type, "text" ),
    GetSQLValueString( $subsdate, "text" ),
    GetSQLValueString( $subedate, "text" ),
    GetSQLValueString( $allowedprofiles, "int" ) );

$Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

$query_Recordset2 = "SELECT * FROM `subscription` ORDER BY subscription_id DESC LIMIT 1";
$Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

$insertSQL = sprintf( "INSERT INTO `payment`(`user_id`, `subscription_id`, `amount`, `paymentdate`) VALUES (%s, %s, %s, NOW())",
    GetSQLValueString( $user_id, "text" ),
    GetSQLValueString( $row_Recordset2['subscription_id'], "text" ),
    GetSQLValueString( $_POST['amount'], "int") );
    
$Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );
 
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

    <!-- PRICING PLANS -->
    <section>
        <div class="plans-ban">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 margin-top-30">
                        <?php
		echo '<div class="alert alert-success text-center" style="text-transform:uppercase; font-size: 30px; font-weight: 400">Thank You For Subscription!!!</div>';
	?>
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