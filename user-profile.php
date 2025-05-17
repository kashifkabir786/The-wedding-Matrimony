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
            <span class="lod1">
                <img src="images/loder/1.png" alt="" loading="lazy">
            </span>
            <span class="lod2">
                <img src="images/loder/2.png" alt="" loading="lazy">
            </span>
            <span class="lod3">
                <img src="images/loder/3.png" alt="" loading="lazy">
            </span>
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
                                    <li><a href="user-profile.php" class="act"><i class="fa fa-male"
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
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-8 db-sec-com">
                                <h2 class="db-tit">Profiles status</h2>
                                <div class="db-profile">
                                    <div class="img">
                                        <?php if ($row_Recordset1['photo']) { ?>
                                        <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt=""
                                            loading="lazy">
                                        <?php } else { ?>
                                        <img src="images/profiles/dummy-profile.png" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="edit">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="user-profile-edit.php" class="cta-dark">Edit
                                                    profile</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="add-photo.php" class="cta-dark">Add Photo
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
                                <h2 class="db-tit">Profiles status</h2>
                                <div class="db-pro-stat">
                                    <h6>Profile completion</h6>
                                    <div class="db-pro-pgog">
                                        <span>
                                            <b class="count"><?php echo round($Percentage); ?></b>%
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 db-sec-com db-pro-stat-pg">
                                <h2 class="db-tit">Profiles views</h2>
                                <div class="db-pro-stat-view-filter cho-round-cor chosenini">
                                    <div>
                                        <select class="chosen-select">
                                            <option value="">Current month</option>
                                            <option value="">Jan 2024</option>
                                            <option value="">Fan 2024</option>
                                            <option value="">Mar 2024</option>
                                            <option value="">Apr 2024</option>
                                            <option value="">May 2024</option>
                                            <option value="">Jun 2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="chartin">
                                    <canvas id="Chart_leads"></canvas>
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
    <script src="js/Chart.js"></script>
    <script src="js/custom.js"></script>
    <script>
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