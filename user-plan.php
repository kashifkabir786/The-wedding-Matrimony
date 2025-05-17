<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
    
    $query_Recordset4 = "SELECT A.*, B.* FROM subscription AS A INNER JOIN payment AS B ON A.subscription_id = B.subscription_id WHERE A.user_id = '{$row_Recordset1['user_id']}'";
    $Recordset4 = mysqli_query( $theweddingmatrimony, $query_Recordset4 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset4 = mysqli_fetch_assoc( $Recordset4 );
    $totalRows_Recordset4 = mysqli_num_rows( $Recordset4 );

    if (!empty($row_Recordset['subsdate']) && !empty($row_Recordset['subedate'])) {
    $subsdate = $subsdate->format('Y-m-d');
    $subedate = $subedate->format('Y-m-d'); 
    $query_Recordset5 = "SELECT COUNT(sender_id) as requests FROM `interest` WHERE sender_id = '{$row_Recordset1['user_id']}' AND `date` BETWEEN '$subsdate' AND '$subedate'";
    $Recordset5 = mysqli_query( $theweddingmatrimony, $query_Recordset5 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset5 = mysqli_fetch_assoc( $Recordset5 );
    $totalRows_Recordset5 = mysqli_num_rows( $Recordset5 );

    $query_Recordset6 = "SELECT COUNT(sender_id) as profileviews FROM `profileviews` WHERE sender_id = '{$row_Recordset1['user_id']}' AND `date` BETWEEN '{$row_Recordset['subsdate']}' AND '{$row_Recordset['subedate']}'";
    $Recordset6 = mysqli_query( $theweddingmatrimony, $query_Recordset6 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset6 = mysqli_fetch_assoc( $Recordset6 );
    $totalRows_Recordset6 = mysqli_num_rows( $Recordset6 );

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

    <!-- LOGIN -->
    <section>
        <div class="db">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="db-nav">
                            <div class="db-nav-pro"><?php if ($row_Recordset1['photo']) { ?>
                                <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt=""
                                    loading="lazy">
                                <?php } else { ?>
                                <img src="images/profiles/dummy-profile.png" alt="">
                                <?php } ?>
                            </div>
                            <div class="db-nav-list">
                                <ul>
                                    <li><a href="user-dashboard.php"><i class="fa fa-tachometer"
                                                aria-hidden="true"></i>Dashboard</a></li>
                                    <li><a href="user-profile.php"><i class="fa fa-male"
                                                aria-hidden="true"></i>Profile</a></li>
                                    <li><a href="alluser.php"><i class="fa fa-user" aria-hidden="true"></i>All Users</a>
                                    </li>
                                    <li><a href="my-request.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>My
                                            Request</a></li>
                                    <li><a href="user-need.php"><i class="fa fa-commenting-o" aria-hidden="true"></i>My
                                            Need</a></li>
                                    <li><a href="user-plan.php" class="act"><i class="fa fa-money"
                                                aria-hidden="true"></i>My
                                            Plan</a>
                                    </li>
                                    <li><a href="user-setting.php"><i class="fa fa-cog"
                                                aria-hidden="true"></i>Setting</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log
                                            out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="row">
                            <div class="col-md-4 db-sec-com">
                                <h2 class="db-tit">Plan details</h2>
                                <div class="db-pro-stat">
                                    <h6 class="tit-top-curv">Current plan</h6>
                                    <div class="db-plan-card">
                                        <img src="images/icon/plan.png" alt="">
                                    </div>
                                    <div class="db-plan-detil">
                                        <?php if($totalRows_Recordset > 0) { ?>
                                        <?php if (!$profileviews) { ?>
                                        <p>Your plan has expired or you have exceeded the profile views.
                                            Please subscribe to continue.</p>
                                        <li><a href="plans.php" class="cta-3">Buy Now</a></li>
                                        <?php } else { ?>
                                        <ul>
                                            <li>Plan name:
                                                <strong><?php echo $row_Recordset['subscription_type']; ?>(<?php echo $row_Recordset['allowedprofiles']; ?>
                                                    profiles)</strong>
                                            </li>
                                            <li>Validity: <strong><?php echo $months; ?> Months</strong></li>
                                            <li>Valid till
                                                <strong><?php echo date('d M Y',strtotime($row_Recordset['subedate'])); ?></strong>
                                            </li>
                                            <li>Sent Interests:
                                                <strong><?php echo $row_Recordset5['requests']; ?></strong>
                                            </li>
                                            <li>Profile Views:
                                                <strong><?php echo $row_Recordset6['profileviews']; ?></strong>
                                            </li>
                                        </ul>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 db-sec-com">
                                <h2 class="db-tit">All invoice</h2>
                                <div class="db-invoice">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Plan type</th>
                                                <th>Duration</th>
                                                <th>Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($totalRows_Recordset4) && $totalRows_Recordset4 > 0) { ?>
                                            <?php do { 
                                            $subscription_type = $row_Recordset4['subscription_type'];
                                            $subsdate = new DateTime($row_Recordset4['subsdate']);
                                            $subedate = new DateTime($row_Recordset4['subedate']);
                                            $subsdate_formatted = $subsdate->format('M Y');
                                            $subedate_formatted = $subedate->format('M Y');
                                            $interval = $subsdate->diff($subedate);
                                            $months = ($interval->y * 12) + $interval->m + ($interval->d > 0 ? 1 : 0);
                                            ?>
                                            <tr>
                                                <td><?php echo $subscription_type; ?></td>
                                                <td><?php echo $months; ?> Months(<?php echo $subsdate_formatted; ?> -
                                                    <?php echo $subedate_formatted; ?>)</td>
                                                <td>&#x20B9;<?php echo $row_Recordset4['amount']; ?></td>
                                            </tr>
                                            <?php }while($row_Recordset4=mysqli_fetch_assoc($Recordset4));} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 db-sec-com">
                                <div class="alert alert-warning db-plan-canc">
                                    <p><strong>Plan cancellation:</strong> <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#plancancel">Click here</a> to cancell the current plan.</p>
                                </div>
                            </div>
                            <div class="col-md-12 db-sec-com">
                                <div class="alert alert-warning db-plan-canc db-plan-canc-app">
                                    <p>Your plan cancellation request has been successfully received by the admin. Once
                                        the admin approves your cancellation, the cost will be sent to you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- FOOTER -->
    <?php include('footer.php'); ?>
    <!-- END -->

    <!-- INTEREST POPUP -->
    <div class="modal fade plncanl-pop" id="plancancel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Plan cancellation</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter chosenini">
                    <div class="row">
                        <div class="col-md-6 lhs-poli">
                            <h5>Cancellation policy</h5>
                            <ul>
                                <li>Your refund amount calculated day basis</li>
                                <li>As per your plan, your perday cost:10$</li>
                                <li>After 3 months only you can able to join</li>
                                <li>Fair ipsum dummy content ipsum jenuane ai</li>
                                <li>Rairt ipsum dummy content ipsum jenuane ai</li>
                            </ul>
                        </div>
                        <div class="col-md-6 rhs-form">
                            <div class="form-login">
                                <form>
                                    <div class="form-group">
                                        <label class="lb">Reason for the cancellation: *</label>
                                        <select class="chosen-select">
                                            <option value="">I joint my pare</option>
                                            <option value="">Profile match not good</option>
                                            <option value="">Support not good</option>
                                            <option value="">My reason not in the list</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="lb">Message: *</label>
                                        <textarea placeholder="Enter your message" class="form-control" id="" cols="20"
                                            rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Plan type</th>
                                        <th>Duration</th>
                                        <th>Cost paid</th>
                                        <th>Perday cost</th>
                                        <th>Plan active days</th>
                                        <th>Remaining days</th>
                                        <th>Cancellation charges</th>
                                        <th>Cost saved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Platinum</td>
                                        <td>365 days(12 months)</td>
                                        <td>$1000</td>
                                        <td>$2.73</td>
                                        <td>190 days</td>
                                        <td>175 days</td>
                                        <td>$100</td>
                                        <td>$377.75</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END INTEREST POPUP -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/custom.js"></script>
    <script>
    //COMMON SLIDER
    $('.slider').slick({
        infinite: false,
        slidesToShow: 5,
        arrows: false,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: false
            }
        }]

    });

    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    var xValues = "0";
    var yValues = "50";

    new Chart("Chart_leads", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#f1bb51",
                borderColor: "#fae9c8",
                data: yValues
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 100
                    }
                }]
            }
        }
    });
    </script>
</body>

</html>