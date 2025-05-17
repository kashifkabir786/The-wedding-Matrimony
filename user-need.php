<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php

    $query_Recordset4 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.receiver_id = B.user_id WHERE status = 'Pending' AND A.sender_id = '{$row_Recordset1['user_id']}' ORDER BY B.user_id LIMIT 10";
    $Recordset4 = mysqli_query( $theweddingmatrimony, $query_Recordset4 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset4 = mysqli_fetch_assoc( $Recordset4 );
    $totalRows_Recordset4 = mysqli_num_rows( $Recordset4 );

    $query_Recordset5 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.receiver_id = B.user_id WHERE status = 'Accept' AND A.sender_id = '{$row_Recordset1['user_id']}' ORDER BY B.user_id LIMIT 10";
    $Recordset5 = mysqli_query( $theweddingmatrimony, $query_Recordset5 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset5 = mysqli_fetch_assoc( $Recordset5 );
    $totalRows_Recordset5 = mysqli_num_rows( $Recordset5 );

    $query_Recordset6 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.receiver_id = B.user_id WHERE status = 'Deny' AND A.sender_id = '{$row_Recordset1['user_id']}' ORDER BY B.user_id LIMIT 10";
    $Recordset6 = mysqli_query( $theweddingmatrimony, $query_Recordset6 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset6 = mysqli_fetch_assoc( $Recordset6 );
    $totalRows_Recordset6 = mysqli_num_rows( $Recordset6 );

?>
<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
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
                                    <li><a href="my-request.php" class="act"><i class="fa fa-handshake-o"
                                                aria-hidden="true"></i>My Request</a></li>
                                    <li><a href="user-need.php"><i class="fa fa-commenting-o" aria-hidden="true"></i>My
                                            Need</a></li>
                                    <li><a href="user-plan.php"><i class="fa fa-money" aria-hidden="true"></i>My
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
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Interest request</h2>
                                <div class="db-pro-stat">
                                    <div class="db-inte-main">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home">New
                                                    requests</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#menu1">Accept
                                                    requests</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#menu2">Deny requests</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="home" class="container tab-pane active"><br>
                                                <div class="db-inte-prof-list">
                                                    <ul>
                                                        <?php if ($totalRows_Recordset4 > 0) { ?>
                                                        <?php do{ ?>
                                                        <li>
                                                            <div class="db-int-pro-1">
                                                                <img src="images/profiles/<?php echo $row_Recordset4['photo']; ?>"
                                                                    alt="">
                                                                <span class="badge bg-primary user-pla-pat">Platinum
                                                                    user</span>
                                                            </div>
                                                            <div class="db-int-pro-2">
                                                                <h5><?php echo $row_Recordset4['mname']; ?></h5>
                                                                <ol class="poi">
                                                                    <li>City:
                                                                        <strong><?php echo $row_Recordset4['city']; ?></strong>
                                                                    </li>
                                                                    <li>Age:
                                                                        <strong><?php echo $row_Recordset4['age']; ?></strong>
                                                                    </li>
                                                                    <li>Height:
                                                                        <strong><?php echo $row_Recordset4['height']; ?></strong>
                                                                    </li>
                                                                    <li>Job:
                                                                        <strong><?php echo $row_Recordset4['job']; ?></strong>
                                                                    </li>
                                                                </ol>
                                                                <ol class="poi poi-date">
                                                                    <li>Request on:
                                                                        <?php echo date('h:i a, d M Y', strtotime($row_Recordset4['date'])); ?>
                                                                    </li>
                                                                </ol>
                                                                <a href="profile-details.php?user_id=<?php echo $row_Recordset4['user_id']; ?>"
                                                                    class="cta-5" target="_blank">View full profile</a>
                                                            </div>
                                                            <div class="db-int-pro-3">

                                                            </div>
                                                        </li>
                                                        <?php }while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="menu2" class="container tab-pane fade"><br>
                                                <div class="db-inte-prof-list">
                                                    <ul>
                                                        <?php if ($totalRows_Recordset6 > 0) { ?>
                                                        <?php do{ ?>
                                                        <li>
                                                            <div class="db-int-pro-1">
                                                                <img src="images/profiles/<?php echo $row_Recordset6['photo']; ?>"
                                                                    alt="">
                                                            </div>
                                                            <div class="db-int-pro-2">
                                                                <h5><?php echo $row_Recordset6['mname']; ?></h5>
                                                                <ol class="poi">
                                                                    <li>City:
                                                                        <strong><?php echo $row_Recordset6['city']; ?></strong>
                                                                    </li>
                                                                    <li>Age:
                                                                        <strong><?php echo $row_Recordset6['age']; ?></strong>
                                                                    </li>
                                                                    <li>Height:
                                                                        <strong><?php echo $row_Recordset6['height']; ?></strong>
                                                                    </li>
                                                                    <li>Job:
                                                                        <strong><?php echo $row_Recordset6['job']; ?></strong>
                                                                    </li>
                                                                </ol>
                                                                <ol class="poi poi-date">
                                                                    <li>Request on:
                                                                        <?php echo date('h:i a, d M Y', strtotime($row_Recordset6['date'])); ?>
                                                                    </li>
                                                                    <!-- <li>Accept on: 3:00 PM, 21 August 2024</li> -->
                                                                </ol>
                                                                <a href="profile-details.php?user_id=<?php echo $row_Recordset6['user_id']; ?>"
                                                                    class="cta-5" target="_blank">View full profile</a>
                                                            </div>
                                                            <div class="db-int-pro-3">

                                                            </div>
                                                        </li>
                                                        <?php }while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6)); } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="menu1" class="container tab-pane fade"><br>
                                                <div class="db-inte-prof-list">
                                                    <ul>
                                                        <?php if ($totalRows_Recordset5 > 0) { ?>
                                                        <?php do{ ?>
                                                        <li>
                                                            <div class="db-int-pro-1">
                                                                <img src="images/profiles/<?php echo $row_Recordset5['photo']; ?>"
                                                                    alt="">
                                                            </div>
                                                            <div class="db-int-pro-2">
                                                                <h5><?php echo $row_Recordset5['mname']; ?></h5>
                                                                <ol class="poi">
                                                                    <li>City:
                                                                        <strong><?php echo $row_Recordset5['city']; ?></strong>
                                                                    </li>
                                                                    <li>Age:
                                                                        <strong><?php echo $row_Recordset5['age']; ?></strong>
                                                                    </li>
                                                                    <li>Height:
                                                                        <strong><?php echo $row_Recordset5['height']; ?></strong>
                                                                    </li>
                                                                    <li>Job:
                                                                        <strong><?php echo $row_Recordset5['job']; ?></strong>
                                                                    </li>
                                                                </ol>
                                                                <ol class="poi poi-date">
                                                                    <li>Request on:
                                                                        <?php echo date('h:i a, d M Y', strtotime($row_Recordset5['date'])); ?>
                                                                    </li>
                                                                    <!-- <li>Deny on: 3:00 PM, 21 August 2024</li> -->
                                                                </ol>
                                                                <a href="profile-details.php?user_id=<?php echo $row_Recordset5['user_id']; ?>"
                                                                    class="cta-5" target="_blank">View full profile</a>
                                                            </div>
                                                            <div class="db-int-pro-3">

                                                            </div>
                                                        </li>
                                                        <?php }while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5)); } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
    <script>
    document.addEventListener('contextmenu', (event) => {
        event.preventDefault();
    });
    </script>
</body>

</html>