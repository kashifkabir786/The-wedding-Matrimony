<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session-2.php'); ?>
<?php
     
    if ( isset( $_SESSION[ 'email' ] ) ) {
    $query_Recordset2 = "SELECT * FROM payment WHERE user_id = '{$row_Recordset1['user_id']}'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

    $subscription_active = false;

    if ($totalRows_Recordset2 > 0) {
        while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)) {
            $subedate = new DateTime($row_Recordset2['subedate']);
            $today = new DateTime();
            if ($subedate >= $today) {
                $subscription_active = true;
                break;
            }
        }
    }

    if ($subscription_active) {
        $link = "profiles.php";
    } else {
        $link = "thankyou.php";
    }
    } else {
    $link = "thankyou.php";
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
                    <span class="pri">Pricing</span>
                    <h1>Get Started <br> Pick your Plan Now</h1>
                    <p>Explore our membership plans designed to meet your needs. </p>
                    <span class="nocre">No credit card required</span>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- PRICING PLANS -->
    <section>
        <div class="plans-main">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="pri-box">
                                <h2>Free</h2>
                                <!-- <p>Printer took a type and scrambled </p> -->
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Free">
                                    <input type="hidden" name="amount" value="Free">
                                </form>
                                <span class="pri-cou"><b> Free</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 1 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>365 Days</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>5 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>0 Contact View</li>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="pri-box">
                                <h2>Bronze</h2>
                                <!-- <p>Printer took a type and scrambled </p> -->
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn-1">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Bronze">
                                    <input type="hidden" name="amount" value="3500">
                                </form>
                                <span class="pri-cou"><b>&#x20b9; 3500</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 2 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>90 Days</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>25 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>150 Contact info View</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Show Auto Profile Match</li>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="pri-box">
                                <h2>Silver</h2>
                                <!-- <p>Printer took a type and scrambled </p> -->
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Silver">
                                    <input type="hidden" name="amount" value="5500">
                                </form>
                                <span class="pri-cou"><b>&#x20b9; 5500</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 10 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>180 Days</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>50 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>300 Contact info View</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Show Auto Profile Match</li>
                                </ol>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="row mt-5">
                    <ul>
                        <li>
                            <div class="pri-box">
                                <h2>Gold</h2>
                                <p>With Relationship Manager </p>
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Gold">
                                    <input type="hidden" name="amount" value="7500">
                                </form>
                                <span class="pri-cou"><b>&#x20b9; 7500</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 15 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>270 Days</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>70 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>600 Contact info View</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Show Auto Profile Match</li>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="pri-box">
                                <!-- <span class="pop-pln">Most popular plan</span> -->
                                <h2>Diamond</h2>
                                <p>With Relationship Manager </p>
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn-1">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Diamond">
                                    <input type="hidden" name="amount" value="10000">
                                </form>
                                <span class="pri-cou"><b>&#x20b9; 10000</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 20 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>360 Days</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>100 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>1200 Contact info View</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Show Auto Profile Match</li>
                                </ol>
                            </div>
                        </li>
                        <li>
                            <div class="pri-box">
                                <h2>Platinum</h2>
                                <p>With Relationship Manager </p>
                                <form action="<?php echo $link; ?>" method="POST" name="form2" class="form2">
                                    <button type="submit" name="submit" class="plan-btn">Get Started</button>
                                    <input type="hidden" name="user_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="subscription_type" value="Platinum">
                                    <input type="hidden" name="amount" value="15000">
                                </form>
                                <span class="pri-cou"><b>&#x20b9; 15000</b></span>
                                <ol>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> 50 Gallery Photo Upload
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Days Till Marriage</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>200 Express interest</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>3000 Contact info View</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Show Auto Profile Match</li>
                                </ol>
                            </div>
                        </li>
                    </ul>
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