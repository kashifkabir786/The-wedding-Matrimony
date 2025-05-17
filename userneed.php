<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>

<?php

  $query_Recordset2 = "SELECT * FROM userneed WHERE user_id = '{$row_Recordset1['user_id']}'";
  $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
  $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
  
$flag = isset($row_Recordset2) && !empty($row_Recordset2);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  		$insertSQL = sprintf("INSERT INTO `userneed`(`user_id`, `city`, `age`, `job`, `religion`, `marriage_status`, `hobbies`, `caste`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($row_Recordset1['user_id'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['age'], "text"),
                       GetSQLValueString($_POST['job'], "text"),
                       GetSQLValueString($_POST['religion'], "text"),
					   GetSQLValueString($_POST['marriage_status'], "text"),
                       GetSQLValueString($_POST['hobbies'], "text"),
                       GetSQLValueString($_POST['caste'], "text") );
  		$Result1 = mysqli_query($theweddingmatrimony, $insertSQL) or die(mysqli_error($theweddingmatrimony));
	
		$insertGoTo = "userneed.php?success=Inserted";
  		if (isset($_SERVER['QUERY_STRING'])) {
    		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    		$insertGoTo .= $_SERVER['QUERY_STRING'];
  		}
  		header(sprintf("Location: %s", $insertGoTo));
	}

//updating quotation
if ( ( isset( $_POST[ "MM_update" ] ) ) && ( $_POST[ "MM_update" ] == "form1" ) ) {

  $updateSQL = sprintf( "UPDATE `userneed` SET `city` = %s, `age` = %s, `job` = %s, `religion` = %s, `marriage_status` = %s, `hobbies` = %s, `caste` = %s WHERE user_id = %s",
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['age'], "text"),
                       GetSQLValueString($_POST['job'], "text"),
                       GetSQLValueString($_POST['religion'], "text"),
					   GetSQLValueString($_POST['marriage_status'], "text"),
                       GetSQLValueString($_POST['hobbies'], "text"),
                       GetSQLValueString($_POST['caste'], "text"),
                       GetSQLValueString($_POST['user_id'], "text") );
  $Result = mysqli_query( $theweddingmatrimony, $updateSQL )or die( mysqli_error( $theweddingmatrimony ) );

  $insertGoTo = "userneed.php?success=Updated";
  if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
    $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
  }
  header( sprintf( "Location: %s", $insertGoTo ) );
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

    <!-- REGISTER -->
    <section>
        <div class="login pro-edit-update">
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
                                    <li><a href="user-need.php" class="act"><i class="fa fa-commenting-o"
                                                aria-hidden="true"></i>My
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
                            <div class="inn">
                                <div class="rhs">
                                    <div class="form-login">
                                        <?php
                            if ( isset( $_GET[ 'success' ] ) ) {
                                echo '<div class="col-md-12">';
                                echo '<div class="alert alert-success">My Need ' . $_GET[ 'success' ] . ' Successfully</div>';
                                echo '</div>';
                            }
                            ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST" name="form1"
                                            class="form-horizontal" id="form1" role="form">
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Basic info</h4>
                                                    <h1>My Need</h1>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Marriage status:</label>
                                                    <select class="form-control chosen-select" name="marriage_status"
                                                        required>
                                                        <option value="">Select Marriage Status</option>
                                                        <option value="Single"
                                                            <?php if ($flag && $row_Recordset2['marriage_status'] == 'Single') echo 'selected'; ?>>
                                                            Single</option>
                                                        <option value="Married"
                                                            <?php if ($flag && $row_Recordset2['marriage_status'] == 'Married') echo 'selected'; ?>>
                                                            Married</option>
                                                        <option value="Divorced"
                                                            <?php if ($flag && $row_Recordset2['marriage_status'] == 'Divorced') echo 'selected'; ?>>
                                                            Divorced</option>
                                                        <option value="Widowed"
                                                            <?php if ($flag && $row_Recordset2['marriage_status'] == 'Widowed') echo 'selected'; ?>>
                                                            Widowed</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Caste:</label>
                                                    <select class="form-select chosen-select" name="caste"
                                                        data-placeholder="Select your Caste" required>
                                                        <option value="">Select Caste</option>
                                                        <option value="Brahmin"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Brahmin') echo 'selected'; ?>>
                                                            Brahmin</option>
                                                        <option value="Kshatriya"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Kshatriya') echo 'selected'; ?>>
                                                            Kshatriya</option>
                                                        <option value="Vaishya"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Vaishya') echo 'selected'; ?>>
                                                            Vaishya</option>
                                                        <option value="Shudra"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Shudra') echo 'selected'; ?>>
                                                            Shudra</option>
                                                        <option value="Jat"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Jat') echo 'selected'; ?>>
                                                            Jat</option>
                                                        <option value="Yadav"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Yadav') echo 'selected'; ?>>
                                                            Yadav</option>
                                                        <option value="Rajput"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Rajput') echo 'selected'; ?>>
                                                            Rajput</option>
                                                        <option value="Scheduled Castes (Dalit, etc.)"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Scheduled Castes (Dalit, etc.)') echo 'selected'; ?>>
                                                            Scheduled Castes (Dalit, etc.)</option>
                                                        <option value="Scheduled Tribes"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Scheduled Tribes') echo 'selected'; ?>>
                                                            Scheduled Tribes</option>
                                                        <option value="Other Backward Classes (OBCs)"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Other Backward Classes (OBCs)') echo 'selected'; ?>>
                                                            Other Backward Classes (OBCs)</option>
                                                        <option value="Maratha"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Maratha') echo 'selected'; ?>>
                                                            Maratha</option>
                                                        <option value="Lingayat"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Lingayat') echo 'selected'; ?>>
                                                            Lingayat</option>
                                                        <option value="Kayastha"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Kayastha') echo 'selected'; ?>>
                                                            Kayastha</option>
                                                        <option value="Reddy"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Reddy') echo 'selected'; ?>>
                                                            Reddy</option>
                                                        <option value="Vokkaliga"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Vokkaliga') echo 'selected'; ?>>
                                                            Vokkaliga</option>
                                                        <option value="Nair"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Nair') echo 'selected'; ?>>
                                                            Nair</option>
                                                        <option value="Ezhava"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Ezhava') echo 'selected'; ?>>
                                                            Ezhava</option>
                                                        <option value="Sayed"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Sayed') echo 'selected'; ?>>
                                                            Sayed</option>
                                                        <option value="Shia"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Shia') echo 'selected'; ?>>
                                                            Shia</option>
                                                        <option value="Gujjar"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Gujjar') echo 'selected'; ?>>
                                                            Gujjar</option>
                                                        <option value="Sudhi Baniya"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Sudhi Baniya') echo 'selected'; ?>>
                                                            Sudhi Baniya</option>
                                                        <option value="Kurmi"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'Kurmi') echo 'selected'; ?>>
                                                            Kurmi</option>
                                                        <option value="KamKunj Brahman"
                                                            <?php if ($flag && $row_Recordset2['caste'] == 'KamKunj Brahman') echo 'selected'; ?>>
                                                            KamKunj Brahman</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>City:</label>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                        value="<?php if($flag) echo $row_Recordset2['city'] ?>"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" id="age" name="age"
                                                        value="<?php if($flag) echo $row_Recordset2['age'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lb">Job:</label>
                                                    <select class="form-control chosen-select" name="job">
                                                        <option value="">Select Job Status</option>
                                                        <option value="Working"
                                                            <?php if ($row_Recordset1['job'] == 'Working') echo 'selected'; ?>>
                                                            Working</option>
                                                        <option value="Not Working"
                                                            <?php if ($row_Recordset1['job'] == 'Not Working') echo 'selected'; ?>>
                                                            Not Working</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Religion</label>
                                                    <input type="text" class="form-control" id="religion"
                                                        name="religion"
                                                        value="<?php if($flag) echo $row_Recordset2['religion'] ?>"
                                                        required>
                                                </div>

                                                <div class="chosenini">
                                                    <div class="form-group">
                                                        <label>Hobbies</label>
                                                        <select class="chosen-select" name="hobbies"
                                                            data-placeholder="Select your Hobbies" multiple required>
                                                            <option></option>
                                                            <option value="Modelling"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Modelling') echo 'selected'; ?>>
                                                                Modelling </option>
                                                            <option value="Watching"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Watching') echo 'selected'; ?>>
                                                                Watching </option>
                                                            <option value="movies"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'movies') echo 'selected'; ?>>
                                                                movies </option>
                                                            <option value="Playing"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Playing') echo 'selected'; ?>>
                                                                Playing </option>
                                                            <option value="volleyball"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'volleyball') echo 'selected'; ?>>
                                                                volleyball</option>
                                                            <option value="Hangout with family"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Hangout with family') echo 'selected'; ?>>
                                                                Hangout with family </option>
                                                            <option value="Adventure travel"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Adventure travel') echo 'selected'; ?>>
                                                                Adventure travel </option>
                                                            <option value="Books reading"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Books reading') echo 'selected'; ?>>
                                                                Books reading </option>
                                                            <option value="Music"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Music') echo 'selected'; ?>>
                                                                Music </option>
                                                            <option value="Cooking"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Cooking') echo 'selected'; ?>>
                                                                Cooking </option>
                                                            <option value="Yoga"
                                                                <?php if ($flag && $row_Recordset2['hobbies'] == 'Yoga') echo 'selected'; ?>>
                                                                Yoga</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--END PROFILE BIO-->
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <?php if ($flag) { ?>
                                            <input type="hidden" name="MM_update" value="form1">
                                            <input type="hidden" name="user_id"
                                                value="<?php echo $row_Recordset2['user_id']; ?>">
                                            <?php } else { ?>
                                            <input type="hidden" name="MM_insert" value="form1">
                                            <?php } ?>
                                        </form>
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
</body>

</html>