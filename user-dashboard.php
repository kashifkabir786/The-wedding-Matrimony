<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$totalFields = 36; 
$completedFields = 0;

if (!empty($row_Recordset1['mname'])) $completedFields++;
if (!empty($row_Recordset1['mobile1'])) $completedFields++;
if (!empty($row_Recordset1['gender'])) $completedFields++;
if (!empty($row_Recordset1['dob'])) $completedFields++;
if (!empty($row_Recordset1['age'])) $completedFields++;
if (!empty($row_Recordset1['mothertongue'])) $completedFields++;
if (!empty($row_Recordset1['religion'])) $completedFields++;
if (!empty($row_Recordset1['caste'])) $completedFields++;
if (!empty($row_Recordset1['subcast'])) $completedFields++;
if (!empty($row_Recordset1['manglik'])) $completedFields++;
if (!empty($row_Recordset1['occupation'])) $completedFields++;
if (!empty($row_Recordset1['income'])) $completedFields++;
if (!empty($row_Recordset1['education'])) $completedFields++;
if (!empty($row_Recordset1['children'])) $completedFields++;
if (!empty($row_Recordset1['country'])) $completedFields++;
if (!empty($row_Recordset1['state'])) $completedFields++;
if (!empty($row_Recordset1['city'])) $completedFields++;
if (!empty($row_Recordset1['village'])) $completedFields++;
if (!empty($row_Recordset1['fathername'])) $completedFields++;
if (!empty($row_Recordset1['mothername'])) $completedFields++;
if (!empty($row_Recordset1['brothers'])) $completedFields++;
if (!empty($row_Recordset1['sisters'])) $completedFields++;
if (!empty($row_Recordset1['photo'])) $completedFields++;
if (!empty($row_Recordset1['photo2'])) $completedFields++;
if (!empty($row_Recordset1['photo3'])) $completedFields++;
if (!empty($row_Recordset1['marriage_status'])) $completedFields++;
if (!empty($row_Recordset1['job'])) $completedFields++;
if (!empty($row_Recordset1['address'])) $completedFields++;
if (!empty($row_Recordset1['degree'])) $completedFields++;
if (!empty($row_Recordset1['company'])) $completedFields++;
if (!empty($row_Recordset1['position'])) $completedFields++;
if (!empty($row_Recordset1['about'])) $completedFields++;
if (!empty($row_Recordset1['whatsapp'])) $completedFields++;
if (!empty($row_Recordset1['facebook'])) $completedFields++;
if (!empty($row_Recordset1['instagram'])) $completedFields++;
if (!empty($row_Recordset1['linkedin'])) $completedFields++;

$Percentage = ($completedFields / $totalFields) * 100;

    $totalRows_Recordset3 = 0;

    $query_Recordset2 = "SELECT * FROM userneed WHERE user_id = '{$row_Recordset1['user_id']}'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

    if ($totalRows_Recordset2 > 0) {
    $marriage_status = $row_Recordset2['marriage_status']; 
    $city = $row_Recordset2['city']; 
    $age = $row_Recordset2['age']; 
    $hobbies = $row_Recordset2['hobbies']; 
    $job = $row_Recordset2['job']; 
    $religion = $row_Recordset2['religion']; 
    $caste = $row_Recordset2['caste']; 
    $gender = $row_Recordset1['gender'];
    
    $query_Recordset3 = "SELECT * FROM user WHERE (marriage_status = '$marriage_status' AND city = '$city' AND age = '$age' AND hobbies = '$hobbies' AND job = '$job' AND religion = '$religion' AND caste = '$caste' AND gender != '$gender') AND user_id != '{$row_Recordset2['user_id']}'";
    $Recordset3 = mysqli_query( $theweddingmatrimony, $query_Recordset3 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
    $totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );

    }

    $editFormAction = $_SERVER[ 'PHP_SELF' ];
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
    }

    if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

    	$updateSQL = sprintf("UPDATE `interest` SET status = %s WHERE receiver_id = %s AND sender_id = %s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($row_Recordset1['user_id'], "text"),
                       GetSQLValueString($_POST['sender_id'], "text") );
  		$Result1 = mysqli_query($theweddingmatrimony, $updateSQL) or die(mysqli_error($theweddingmatrimony));

        $insertGoTo = "user-dashboard.php?success=Updated";
  		if (isset($_SERVER['QUERY_STRING'])) {
    		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    		$insertGoTo .= $_SERVER['QUERY_STRING'];
  		}
  		header(sprintf("Location: %s", $insertGoTo));
	}

    $query_Recordset4 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.sender_id = B.user_id WHERE status = 'Pending' AND A.receiver_id = '{$row_Recordset1['user_id']}'";
    $Recordset4 = mysqli_query( $theweddingmatrimony, $query_Recordset4 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset4 = mysqli_fetch_assoc( $Recordset4 );
    $totalRows_Recordset4 = mysqli_num_rows( $Recordset4 );

    $query_Recordset5 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.sender_id = B.user_id WHERE status = 'Accept' AND A.receiver_id = '{$row_Recordset1['user_id']}'";
    $Recordset5 = mysqli_query( $theweddingmatrimony, $query_Recordset5 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset5 = mysqli_fetch_assoc( $Recordset5 );
    $totalRows_Recordset5 = mysqli_num_rows( $Recordset5 );

    $query_Recordset6 = "SELECT A.*, B.* FROM interest AS A INNER JOIN user AS B ON A.sender_id = B.user_id WHERE status = 'Deny' AND A.receiver_id = '{$row_Recordset1['user_id']}'";
    $Recordset6 = mysqli_query( $theweddingmatrimony, $query_Recordset6 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset6 = mysqli_fetch_assoc( $Recordset6 );
    $totalRows_Recordset6 = mysqli_num_rows( $Recordset6 );

    if (!empty($row_Recordset['subsdate']) && !empty($row_Recordset['subedate'])) {
    $subsdate = $subsdate->format('Y-m-d');
    $subedate = $subedate->format('Y-m-d'); 
    $query_Recordset8 = "SELECT COUNT(sender_id) as requests FROM `interest` WHERE sender_id = '{$row_Recordset1['user_id']}' AND `date` BETWEEN '$subsdate' AND '$subedate'";
    $Recordset8 = mysqli_query( $theweddingmatrimony, $query_Recordset8 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset8 = mysqli_fetch_assoc( $Recordset8 );
    $totalRows_Recordset8 = mysqli_num_rows( $Recordset8 );

    $query_Recordset9 = "SELECT COUNT(sender_id) as profileviews FROM `profileviews` WHERE sender_id = '{$row_Recordset1['user_id']}' AND `date` BETWEEN '{$row_Recordset['subsdate']}' AND '{$row_Recordset['subedate']}'";
    $Recordset9 = mysqli_query( $theweddingmatrimony, $query_Recordset9 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset9 = mysqli_fetch_assoc( $Recordset9 );
    $totalRows_Recordset9 = mysqli_num_rows( $Recordset9 );

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
                                    <li><a href="user-dashboard.php" class="act"><i class="fa fa-tachometer"
                                                aria-hidden="true"></i>Dashboard</a></li>
                                    <li><a href="user-profile.php"><i class="fa fa-male"
                                                aria-hidden="true"></i>Profile</a></li>
                                    <li><a href="alluser.php"><i class="fa fa-user" aria-hidden="true"></i>All Users</a>
                                    </li>
                                    <li><a href="my-request.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>My
                                            Request</a></li>
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
                        <div class="col-md-12 db-sec-com db-new-pro-main">
                            <h4 class="db-tit">The Wedding Matrimony ID:
                                <?php echo "TWM" . str_pad($row_Recordset1['user_id'], 5, '0', STR_PAD_LEFT); ?></h4>
                            <h2 class="db-tit">New Profiles Matches</h2>
                            <?php if($totalRows_Recordset3 > 0) { ?>
                            <ul class="slider">
                                <?php do{ ?>
                                <li>
                                    <div class="db-new-pro">
                                        <img src="images/profiles/<?php echo $row_Recordset3['photo']; ?>" alt=""
                                            class="profile">
                                        <div>
                                            <h5><?php echo $row_Recordset3['mname']; ?></h5>
                                            <span class="city"><?php echo $row_Recordset3['city']; ?></span>
                                            <span class="age"><?php echo $row_Recordset3['age']; ?> Years old</span>
                                        </div>
                                        <div class="pro-ave" title="User currently available">
                                        </div>
                                        <?php if ($profileviews) { ?>
                                        <a href="profile-details.php?user_id=<?php echo $row_Recordset3['user_id']; ?>"
                                            class="fclick" target="_blank">&nbsp;</a>
                                        <?php } else { ?>
                                        <a href="plans.php" class="fclick" target="_blank">&nbsp;</a>
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php }while($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); ?>
                            </ul>
                            <?php } else { ?>
                            <li>
                                <div class="db-new">
                                    <p>Your Profile was not match Please Update Your <a
                                            href="user-profile-edit.php">Profle</a>
                                    </p>
                                </div>
                            </li>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
                                <h2 class="db-tit">Profiles status</h2>
                                <div class="db-pro-stat">
                                    <h6>Profile completion</h6>
                                    <div class="db-pro-pgog">
                                        <span><b class="count"><?php echo round($Percentage); ?></b>%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
                                <h2 class="db-tit">Plan details</h2>
                                <div class="db-pro-stat">
                                    <h6 class="tit-top-curv">Current plan</h6>
                                    <div class="db-plan-card">
                                        <img src="images/icon/plan.png" alt="">
                                    </div>
                                    <div class="db-plan-detil">
                                        <?php if ($totalRows_Recordset > 0) { ?>
                                        <?php if (!$profileviews) { ?>
                                        <p>Your plan has expired or you have exceeded the profile views. Please
                                            subscribe to continue.</p>
                                        <li><a href="plans.php" class="cta-3">Buy Now</a></li>
                                        <?php } else { ?>
                                        <ul>
                                            <li>Plan name: <strong><?php echo $row_Recordset['subscription_type']; ?>
                                                    (<?php echo $row_Recordset['allowedprofiles']; ?> profiles)</strong>
                                            </li>
                                            <li>Validity: <strong><?php echo $months; ?> Months</strong></li>
                                            <li>Valid till:
                                                <strong><?php echo date('d M Y', strtotime($row_Recordset['subedate'])); ?></strong>
                                            </li>
                                            <li>Sent Interests:
                                                <strong><?php echo $row_Recordset8['requests']; ?></strong>
                                            </li>
                                            <li>Profile Views:
                                                <strong><?php echo $row_Recordset9['profileviews']; ?></strong>
                                            </li>
                                        </ul>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <p>You have no subscription plan.</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                                <?php if ($row_Recordset4['photo']) { ?>
                                                                <img src="images/profiles/<?php echo $row_Recordset4['photo']; ?>"
                                                                    alt="">
                                                                <?php } else { ?>
                                                                <img src="images/profiles/dummy-profile.png" alt="">
                                                                <?php } ?>
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
                                                                <form action="<?php echo $editFormAction; ?>"
                                                                    method="POST" name="form" class="form-inline">
                                                                    <input type="hidden" name="MM_update" value="form1">
                                                                    <input type="hidden" name="receiver_id"
                                                                        value="<?php echo $row_Recordset4['receiver_id']; ?>">
                                                                    <input type="hidden" name="sender_id"
                                                                        value="<?php echo $row_Recordset4['sender_id']; ?>">
                                                                    <button type="submit" name="status" value="Accept"
                                                                        class="btn btn-success btn-sm">Accept</button>
                                                                    <button type="submit" name="status" value="Deny"
                                                                        class="btn btn-outline-danger btn-sm">Deny</button>
                                                                </form>
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
                                                                    <li>Accept on: 3:00 PM, 21 August 2024</li>
                                                                </ol>
                                                                <a href="profile-details.php?user_id=<?php echo $row_Recordset6['user_id']; ?>"
                                                                    class="cta-5" target="_blank">View full profile</a>
                                                            </div>
                                                            <div class="db-int-pro-3">
                                                                <form action="<?php echo $editFormAction; ?>"
                                                                    method="POST" name="form" class="form-inline">
                                                                    <input type="hidden" name="MM_update" value="form1">
                                                                    <input type="hidden" name="receiver_id"
                                                                        value="<?php echo $row_Recordset6['receiver_id']; ?>">
                                                                    <input type="hidden" name="sender_id"
                                                                        value="<?php echo $row_Recordset6['sender_id']; ?>">
                                                                    <button type="submit" name="status" value="Accept"
                                                                        class="btn btn-success btn-sm">Accept</button>
                                                                </form>
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
                                                                    <li>Deny on: 3:00 PM, 21 August 2024</li>
                                                                </ol>
                                                                <a href="profile-details.php?user_id=<?php echo $row_Recordset5['user_id']; ?>"
                                                                    class="cta-5" target="_blank">View full profile</a>
                                                            </div>
                                                            <div class="db-int-pro-3">
                                                                <form action="<?php echo $editFormAction; ?>"
                                                                    method="POST" name="form" class="form-inline">
                                                                    <input type="hidden" name="MM_update" value="form1">
                                                                    <input type="hidden" name="receiver_id"
                                                                        value="<?php echo $row_Recordset5['receiver_id']; ?>">
                                                                    <input type="hidden" name="sender_id"
                                                                        value="<?php echo $row_Recordset5['sender_id']; ?>">
                                                                    <button type="submit" name="status" value="Deny"
                                                                        class="btn btn-outline-danger btn-sm">Deny</button>
                                                                </form>
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
                            <div class="col-md-12 db-sec-com">
                                <h2 class="db-tit">Profiles views</h2>
                                <div class="chartin">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="Chart_leads" width="456" height="228"
                                        style="display: block; width: 456px; height: 228px;"
                                        class="chartjs-render-monitor"></canvas>
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
    <script>
    document.addEventListener('contextmenu', (event) => {
        event.preventDefault();
    });
    </script>
</body>

</html>