<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>

<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

	$dob = $_POST['dob'];
    $dobFormatted = date('Y-m-d', strtotime($dob));

    $state = '';
    $city = '';
    
    if ($_POST['country'] == 'India') {
        $state = $_POST['state'];
        $city = $_POST['city'];
    } else {
        $state = $_POST['state_text'];  
        $city = $_POST['city_text'];    
    }


  		$updateSQL = sprintf("UPDATE user SET mname = %s, mobile2 = %s, gender = %s, city = %s, dob = %s, age = %s, height = %s, weight = %s, fathername = %s, mothername = %s, brothers = %s, sisters = %s, mothertongue = %s, religion = %s, caste = %s, subcast = %s, manglik = %s, occupation = %s, income = %s, education = %s, children = %s, country = %s, state = %s, village = %s, marriage_status = %s, hobbies = %s, about = %s, degree = %s, position = %s, company = %s, job = %s, address = %s, whatsapp = %s, instagram = %s, facebook = %s, linkedin = %s WHERE user_id = %s",
                       GetSQLValueString($_POST['mname'], "text"),
                       GetSQLValueString($_POST['mobile2'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($city, "text"),
					   GetSQLValueString($dobFormatted, "date"),
					   GetSQLValueString($_POST['age'], "text"),
                       GetSQLValueString($_POST['height'], "text"),
					   GetSQLValueString($_POST['weight'], "text"),
                       GetSQLValueString($_POST['fathername'], "text"),
					   GetSQLValueString($_POST['mothername'], "text"),
                       GetSQLValueString($_POST['brothers'], "int"),
					   GetSQLValueString($_POST['sisters'], "int"),
					   GetSQLValueString($_POST['mothertongue'], "text"),
					   GetSQLValueString($_POST['religion'], "text"),
					   GetSQLValueString($_POST['caste'], "text"),
					   GetSQLValueString($_POST['subcast'], "text"),
					   GetSQLValueString($_POST['manglik'], "text"),
					   GetSQLValueString($_POST['occupation'], "text"),
					   GetSQLValueString($_POST['income'], "int"),
					   GetSQLValueString($_POST['education'], "text"),
					   GetSQLValueString($_POST['children'], "text"),
					   GetSQLValueString($_POST['country'], "text"),
					   GetSQLValueString($state, "text"),
					   GetSQLValueString($_POST['village'], "text"),
					   GetSQLValueString($_POST['marriage_status'], "text"),
					   GetSQLValueString($_POST['hobbies'], "text"),
					   GetSQLValueString($_POST['about'], "text"),
					   GetSQLValueString($_POST['degree'], "text"),
					   GetSQLValueString($_POST['position'], "text"),
					   GetSQLValueString($_POST['company'], "text"),
					   GetSQLValueString($_POST['job'], "text"),
					   GetSQLValueString($_POST['address'], "text"),
					   GetSQLValueString($_POST['whatsapp'], "text"),
					   GetSQLValueString($_POST['instagram'], "text"),
					   GetSQLValueString($_POST['facebook'], "text"),
					   GetSQLValueString($_POST['linkedin'], "text"),
					   GetSQLValueString($row_Recordset1['user_id'], "text"));
  		$Result1 = mysqli_query($theweddingmatrimony, $updateSQL) or die(mysqli_error($theweddingmatrimony));
	
		$insertGoTo = "user-profile-edit.php?success=Updated";
  		if (isset($_SERVER['QUERY_STRING'])) {
    		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    		$insertGoTo .= $_SERVER['QUERY_STRING'];
  		}
  		header(sprintf("Location: %s", $insertGoTo));
	}

    $query_Recordset2 = "SELECT DISTINCT(`state`) FROM `cities`";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

    $query_Recordset3 = "SELECT * FROM `religion`";
    $Recordset3 = mysqli_query( $theweddingmatrimony, $query_Recordset3 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
    $totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                            <div class="inn">
                                <div class="rhs">
                                    <div class="form-login">
                                        <?php
                            if ( isset( $_GET[ 'success' ] ) ) {
                                echo '<div class="col-md-12">';
                                echo '<div class="alert alert-success">Profile ' . $_GET[ 'success' ] . ' Successfully</div>';
                                echo '</div>';
                            }
                            ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                            enctype="multipart/form-data" name="form1" class="form-horizontal"
                                            id="form1" role="form">
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Basic info</h4>
                                                    <h1>Edit my profile</h1>
                                                </div>
                                                <div class="form-group">
                                                    <label>Name:</label>
                                                    <input type="text" class="form-control" id="mname" name="mname"
                                                        value="<?php echo $row_Recordset1['mname'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alternate Mobile:</label>
                                                    <input type="number" class="form-control" id="mobile2"
                                                        name="mobile2" value="<?php echo $row_Recordset1['mobile2'] ?>">
                                                </div>

                                            </div>
                                            <!--END PROFILE BIO-->
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Basic info</h4>
                                                    <h1>Advanced bio</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Gender:</label>
                                                        <select class="form-select chosen-select" name="gender"
                                                            data-placeholder="Select your Gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="Man"
                                                                <?php echo ($row_Recordset1['gender'] == 'Man') ? 'selected' : ''; ?>>
                                                                Man</option>
                                                            <option value="Woman"
                                                                <?php echo ($row_Recordset1['gender'] == 'Woman') ? 'selected' : ''; ?>>
                                                                Woman</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Date of birth:</label>
                                                        <input type="date" class="form-control" name="dob"
                                                            value="<?php echo $row_Recordset1['dob']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Age:</label>
                                                        <input type="number" class="form-control" name="age"
                                                            value="<?php echo $row_Recordset1['age']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Mother Tongue:</label>
                                                        <input type="text" class="form-control" name="mothertongue"
                                                            value="<?php echo $row_Recordset1['mothertongue']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Fathers name:</label>
                                                        <input type="text" class="form-control" name="fathername"
                                                            value="<?php echo $row_Recordset1['fathername']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Mothers name:</label>
                                                        <input type="text" class="form-control" name="mothername"
                                                            value="<?php echo $row_Recordset1['mothername']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Brothers:</label>
                                                        <input type="text" class="form-control" name="brothers"
                                                            value="<?php echo $row_Recordset1['brothers']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Sisters:</label>
                                                        <input type="text" class="form-control" name="sisters"
                                                            value="<?php echo $row_Recordset1['sisters']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Height:</label>
                                                        <input type="text" class="form-control" name="height"
                                                            value="<?php echo $row_Recordset1['height']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Weight:</label>
                                                        <input type="text" class="form-control" name="weight"
                                                            value="<?php echo $row_Recordset1['weight']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Income:</label>
                                                        <input type="text" class="form-control" name="income"
                                                            value="<?php echo $row_Recordset1['income']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Religion:</label>
                                                        <select class="form-control chosen-select" name="religion"
                                                            id="religion">
                                                            <option value="">Religion</option>
                                                            <?php
                                                            do {
                                                                $selected = ($row_Recordset1['religion'] == $row_Recordset3['religion']) ? 'selected' : '';
                                                                echo '<option value="' . $row_Recordset3['religion'] . '" ' . $selected . '>' . 
                                                                    $row_Recordset3['religion'] . '</option>';
                                                            } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Caste:</label>
                                                        <select class="chosen-select" name="caste" id="caste">
                                                            <option value="">Select Caste</option>
                                                            <?php if ($row_Recordset1['caste']) { ?>
                                                            <option value="<?php echo $row_Recordset1['caste']; ?>"
                                                                selected>
                                                                <?php echo $row_Recordset1['caste']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Subcast:</label>
                                                        <select class="chosen-select" name="subcast" id="subcast">
                                                            <option value="">Select Subcaste</option>
                                                            <?php if ($row_Recordset1['subcast']) { ?>
                                                            <option value="<?php echo $row_Recordset1['subcast']; ?>"
                                                                selected>
                                                                <?php echo $row_Recordset1['subcast']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Manglik:</label>
                                                        <input type="text" class="form-control" name="manglik"
                                                            value="<?php echo $row_Recordset1['manglik']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Occupation:</label>
                                                        <input type="text" class="form-control" name="occupation"
                                                            value="<?php echo $row_Recordset1['occupation']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Education:</label>
                                                        <input type="text" class="form-control" name="education"
                                                            value="<?php echo $row_Recordset1['education']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
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
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Children:</label>
                                                        <input type="text" class="form-control" name="children"
                                                            value="<?php echo $row_Recordset1['children']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Country:</label>
                                                        <select class="form-control chosen-select" id="country-select"
                                                            name="country">
                                                            <option value="">Select Country</option>
                                                            <option value="Afghanistan"
                                                                <?php echo ($row_Recordset1['country'] == 'Afghanistan') ? 'selected' : ''; ?>>
                                                                Afghanistan</option>
                                                            <option value="Albania"
                                                                <?php echo ($row_Recordset1['country'] == 'Albania') ? 'selected' : ''; ?>>
                                                                Albania</option>
                                                            <option value="Algeria"
                                                                <?php echo ($row_Recordset1['country'] == 'Algeria') ? 'selected' : ''; ?>>
                                                                Algeria</option>
                                                            <option value="Andorra"
                                                                <?php echo ($row_Recordset1['country'] == 'Andorra') ? 'selected' : ''; ?>>
                                                                Andorra</option>
                                                            <option value="Angola"
                                                                <?php echo ($row_Recordset1['country'] == 'Angola') ? 'selected' : ''; ?>>
                                                                Angola</option>
                                                            <option value="Antigua and Barbuda"
                                                                <?php echo ($row_Recordset1['country'] == 'Antigua and Barbuda') ? 'selected' : ''; ?>>
                                                                Antigua and Barbuda</option>
                                                            <option value="Argentina"
                                                                <?php echo ($row_Recordset1['country'] == 'Argentina') ? 'selected' : ''; ?>>
                                                                Argentina</option>
                                                            <option value="Armenia"
                                                                <?php echo ($row_Recordset1['country'] == 'Armenia') ? 'selected' : ''; ?>>
                                                                Armenia</option>
                                                            <option value="Australia"
                                                                <?php echo ($row_Recordset1['country'] == 'Australia') ? 'selected' : ''; ?>>
                                                                Australia</option>
                                                            <option value="Austria"
                                                                <?php echo ($row_Recordset1['country'] == 'Austria') ? 'selected' : ''; ?>>
                                                                Austria</option>
                                                            <option value="Azerbaijan"
                                                                <?php echo ($row_Recordset1['country'] == 'Azerbaijan') ? 'selected' : ''; ?>>
                                                                Azerbaijan</option>
                                                            <option value="Bahamas"
                                                                <?php echo ($row_Recordset1['country'] == 'Bahamas') ? 'selected' : ''; ?>>
                                                                Bahamas</option>
                                                            <option value="Bahrain"
                                                                <?php echo ($row_Recordset1['country'] == 'Bahrain') ? 'selected' : ''; ?>>
                                                                Bahrain</option>
                                                            <option value="Bangladesh"
                                                                <?php echo ($row_Recordset1['country'] == 'Bangladesh') ? 'selected' : ''; ?>>
                                                                Bangladesh</option>
                                                            <option value="Barbados"
                                                                <?php echo ($row_Recordset1['country'] == 'Barbados') ? 'selected' : ''; ?>>
                                                                Barbados</option>
                                                            <option value="Belarus"
                                                                <?php echo ($row_Recordset1['country'] == 'Belarus') ? 'selected' : ''; ?>>
                                                                Belarus</option>
                                                            <option value="Belgium"
                                                                <?php echo ($row_Recordset1['country'] == 'Belgium') ? 'selected' : ''; ?>>
                                                                Belgium</option>
                                                            <option value="Belize"
                                                                <?php echo ($row_Recordset1['country'] == 'Belize') ? 'selected' : ''; ?>>
                                                                Belize</option>
                                                            <option value="Benin"
                                                                <?php echo ($row_Recordset1['country'] == 'Benin') ? 'selected' : ''; ?>>
                                                                Benin</option>
                                                            <option value="Bhutan"
                                                                <?php echo ($row_Recordset1['country'] == 'Bhutan') ? 'selected' : ''; ?>>
                                                                Bhutan</option>
                                                            <option value="Bolivia"
                                                                <?php echo ($row_Recordset1['country'] == 'Bolivia') ? 'selected' : ''; ?>>
                                                                Bolivia</option>
                                                            <option value="Bosnia and Herzegovina"
                                                                <?php echo ($row_Recordset1['country'] == 'Bosnia and Herzegovina') ? 'selected' : ''; ?>>
                                                                Bosnia and Herzegovina</option>
                                                            <option value="Botswana"
                                                                <?php echo ($row_Recordset1['country'] == 'Botswana') ? 'selected' : ''; ?>>
                                                                Botswana</option>
                                                            <option value="Brazil"
                                                                <?php echo ($row_Recordset1['country'] == 'Brazil') ? 'selected' : ''; ?>>
                                                                Brazil</option>
                                                            <option value="Brunei"
                                                                <?php echo ($row_Recordset1['country'] == 'Brunei') ? 'selected' : ''; ?>>
                                                                Brunei</option>
                                                            <option value="Bulgaria"
                                                                <?php echo ($row_Recordset1['country'] == 'Bulgaria') ? 'selected' : ''; ?>>
                                                                Bulgaria</option>
                                                            <option value="Burkina Faso"
                                                                <?php echo ($row_Recordset1['country'] == 'Burkina Faso') ? 'selected' : ''; ?>>
                                                                Burkina Faso</option>
                                                            <option value="Burundi"
                                                                <?php echo ($row_Recordset1['country'] == 'Burundi') ? 'selected' : ''; ?>>
                                                                Burundi</option>
                                                            <option value="Cambodia"
                                                                <?php echo ($row_Recordset1['country'] == 'Cambodia') ? 'selected' : ''; ?>>
                                                                Cambodia</option>
                                                            <option value="Cameroon"
                                                                <?php echo ($row_Recordset1['country'] == 'Cameroon') ? 'selected' : ''; ?>>
                                                                Cameroon</option>
                                                            <option value="Canada"
                                                                <?php echo ($row_Recordset1['country'] == 'Canada') ? 'selected' : ''; ?>>
                                                                Canada</option>
                                                            <option value="China"
                                                                <?php echo ($row_Recordset1['country'] == 'China') ? 'selected' : ''; ?>>
                                                                China</option>
                                                            <option value="Colombia"
                                                                <?php echo ($row_Recordset1['country'] == 'Colombia') ? 'selected' : ''; ?>>
                                                                Colombia</option>
                                                            <option value="Denmark"
                                                                <?php echo ($row_Recordset1['country'] == 'Denmark') ? 'selected' : ''; ?>>
                                                                Denmark</option>
                                                            <option value="Egypt"
                                                                <?php echo ($row_Recordset1['country'] == 'Egypt') ? 'selected' : ''; ?>>
                                                                Egypt</option>
                                                            <option value="France"
                                                                <?php echo ($row_Recordset1['country'] == 'France') ? 'selected' : ''; ?>>
                                                                France</option>
                                                            <option value="Germany"
                                                                <?php echo ($row_Recordset1['country'] == 'Germany') ? 'selected' : ''; ?>>
                                                                Germany</option>
                                                            <option value="Greece"
                                                                <?php echo ($row_Recordset1['country'] == 'Greece') ? 'selected' : ''; ?>>
                                                                Greece</option>
                                                            <option value="India"
                                                                <?php echo ($row_Recordset1['country'] == 'India') ? 'selected' : ''; ?>>
                                                                India</option>
                                                            <option value="Indonesia"
                                                                <?php echo ($row_Recordset1['country'] == 'Indonesia') ? 'selected' : ''; ?>>
                                                                Indonesia</option>
                                                            <option value="Iran"
                                                                <?php echo ($row_Recordset1['country'] == 'Iran') ? 'selected' : ''; ?>>
                                                                Iran</option>
                                                            <option value="Iraq"
                                                                <?php echo ($row_Recordset1['country'] == 'Iraq') ? 'selected' : ''; ?>>
                                                                Iraq</option>
                                                            <option value="Ireland"
                                                                <?php echo ($row_Recordset1['country'] == 'Ireland') ? 'selected' : ''; ?>>
                                                                Ireland</option>
                                                            <option value="Israel"
                                                                <?php echo ($row_Recordset1['country'] == 'Israel') ? 'selected' : ''; ?>>
                                                                Israel</option>
                                                            <option value="Italy"
                                                                <?php echo ($row_Recordset1['country'] == 'Italy') ? 'selected' : ''; ?>>
                                                                Italy</option>
                                                            <option value="Japan"
                                                                <?php echo ($row_Recordset1['country'] == 'Japan') ? 'selected' : ''; ?>>
                                                                Japan</option>
                                                            <option value="Malaysia"
                                                                <?php echo ($row_Recordset1['country'] == 'Malaysia') ? 'selected' : ''; ?>>
                                                                Malaysia</option>
                                                            <option value="Mexico"
                                                                <?php echo ($row_Recordset1['country'] == 'Mexico') ? 'selected' : ''; ?>>
                                                                Mexico</option>
                                                            <option value="Netherlands"
                                                                <?php echo ($row_Recordset1['country'] == 'Netherlands') ? 'selected' : ''; ?>>
                                                                Netherlands</option>
                                                            <option value="New Zealand"
                                                                <?php echo ($row_Recordset1['country'] == 'New Zealand') ? 'selected' : ''; ?>>
                                                                New Zealand</option>
                                                            <option value="Pakistan"
                                                                <?php echo ($row_Recordset1['country'] == 'Pakistan') ? 'selected' : ''; ?>>
                                                                Pakistan</option>
                                                            <option value="Philippines"
                                                                <?php echo ($row_Recordset1['country'] == 'Philippines') ? 'selected' : ''; ?>>
                                                                Philippines</option>
                                                            <option value="Poland"
                                                                <?php echo ($row_Recordset1['country'] == 'Poland') ? 'selected' : ''; ?>>
                                                                Poland</option>
                                                            <option value="Portugal"
                                                                <?php echo ($row_Recordset1['country'] == 'Portugal') ? 'selected' : ''; ?>>
                                                                Portugal</option>
                                                            <option value="Russia"
                                                                <?php echo ($row_Recordset1['country'] == 'Russia') ? 'selected' : ''; ?>>
                                                                Russia</option>
                                                            <option value="Saudi Arabia"
                                                                <?php echo ($row_Recordset1['country'] == 'Saudi Arabia') ? 'selected' : ''; ?>>
                                                                Saudi Arabia</option>
                                                            <option value="Singapore"
                                                                <?php echo ($row_Recordset1['country'] == 'Singapore') ? 'selected' : ''; ?>>
                                                                Singapore</option>
                                                            <option value="South Africa"
                                                                <?php echo ($row_Recordset1['country'] == 'South Africa') ? 'selected' : ''; ?>>
                                                                South Africa</option>
                                                            <option value="South Korea"
                                                                <?php echo ($row_Recordset1['country'] == 'South Korea') ? 'selected' : ''; ?>>
                                                                South Korea</option>
                                                            <option value="Spain"
                                                                <?php echo ($row_Recordset1['country'] == 'Spain') ? 'selected' : ''; ?>>
                                                                Spain</option>
                                                            <option value="Sweden"
                                                                <?php echo ($row_Recordset1['country'] == 'Sweden') ? 'selected' : ''; ?>>
                                                                Sweden</option>
                                                            <option value="Switzerland"
                                                                <?php echo ($row_Recordset1['country'] == 'Switzerland') ? 'selected' : ''; ?>>
                                                                Switzerland</option>
                                                            <option value="Thailand"
                                                                <?php echo ($row_Recordset1['country'] == 'Thailand') ? 'selected' : ''; ?>>
                                                                Thailand</option>
                                                            <option value="Turkey"
                                                                <?php echo ($row_Recordset1['country'] == 'Turkey') ? 'selected' : ''; ?>>
                                                                Turkey</option>
                                                            <option value="Ukraine"
                                                                <?php echo ($row_Recordset1['country'] == 'Ukraine') ? 'selected' : ''; ?>>
                                                                Ukraine</option>
                                                            <option value="United Arab Emirates"
                                                                <?php echo ($row_Recordset1['country'] == 'United Arab Emirates') ? 'selected' : ''; ?>>
                                                                United Arab Emirates</option>
                                                            <option value="United Kingdom"
                                                                <?php echo ($row_Recordset1['country'] == 'United Kingdom') ? 'selected' : ''; ?>>
                                                                United Kingdom</option>
                                                            <option value="United States"
                                                                <?php echo ($row_Recordset1['country'] == 'United States') ? 'selected' : ''; ?>>
                                                                United States</option>
                                                            <option value="Vietnam"
                                                                <?php echo ($row_Recordset1['country'] == 'Vietnam') ? 'selected' : ''; ?>>
                                                                Vietnam</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row" id="state-dropdown">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">State:</label>
                                                        <select name="state" class="form-control chosen-select">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            do {
                                                                echo '<option value="' . $row_Recordset2['state'] . '" ' . 
                                                                    ($row_Recordset1['state'] == $row_Recordset2['state'] ? 'selected' : '') . '>' . 
                                                                    $row_Recordset2['state'] . '</option>';
                                                            } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">City:</label>
                                                        <select name="city" class="form-control" style="display: none;">
                                                            <option value="">Select City</option>
                                                            <?php 
                                                            if ($row_Recordset1['state']) {
                                                                $query_cities = sprintf("SELECT DISTINCT(city) FROM cities WHERE state = %s", 
                                                                    GetSQLValueString($row_Recordset1['state'], "text"));
                                                                $cities_result = mysqli_query($theweddingmatrimony, $query_cities) or die(mysqli_error($theweddingmatrimony));
                                                                
                                                                while ($city_row = mysqli_fetch_assoc($cities_result)) {
                                                                    $selected = ($row_Recordset1['city'] == $city_row['city']) ? 'selected' : '';
                                                                    echo sprintf('<option value="%s" %s>%s</option>', 
                                                                        $city_row['city'], 
                                                                        $selected,
                                                                        $city_row['city']
                                                                    );
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" id="state-input" style="display: none;">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">State:</label>
                                                        <input type="text" class="form-control" name="state_text"
                                                            value="<?php echo $row_Recordset1['state']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">City:</label>
                                                        <input type="text" class="form-control" name="city_text"
                                                            value="<?php echo $row_Recordset1['city']; ?>"
                                                            style="display: none;">
                                                    </div>
                                                </div>
                                                <!-- Add a hidden input to store the final state/city values -->
                                                <input type="hidden" name="state" id="final_state"
                                                    value="<?php echo $row_Recordset1['state']; ?>">
                                                <input type="hidden" name="city" id="final_city"
                                                    value="<?php echo $row_Recordset1['city']; ?>">
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Village:</label>
                                                        <input type="text" class="form-control" name="village"
                                                            value="<?php echo $row_Recordset1['village']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Marriage status:</label>
                                                        <select class="form-control chosen-select"
                                                            name="marriage_status">
                                                            <option value="">Select Marriage Status</option>
                                                            <option value="Single"
                                                                <?php if ($row_Recordset1['marriage_status'] == 'Single') echo 'selected'; ?>>
                                                                Single</option>
                                                            <option value="Married"
                                                                <?php if ($row_Recordset1['marriage_status'] == 'Married') echo 'selected'; ?>>
                                                                Married</option>
                                                            <option value="Divorced"
                                                                <?php if ($row_Recordset1['marriage_status'] == 'Divorced') echo 'selected'; ?>>
                                                                Divorced</option>
                                                            <option value="Widowed"
                                                                <?php if ($row_Recordset1['marriage_status'] == 'Widowed') echo 'selected'; ?>>
                                                                Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Address:</label>
                                                        <input type="text" class="form-control" name="address"
                                                            value="<?php echo $row_Recordset1['address']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Degree:</label>
                                                        <input type="text" class="form-control" name="degree"
                                                            value="<?php echo $row_Recordset1['degree']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Company:</label>
                                                        <input type="text" class="form-control" name="company"
                                                            value="<?php echo $row_Recordset1['company']; ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Position:</label>
                                                        <input type="text" class="form-control" name="position"
                                                            value="<?php echo $row_Recordset1['position']; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <label class="lb">About:</label>
                                                        <textarea class="form-control"
                                                            name="about"><?php echo ($row_Recordset1['about']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>Media</h4>
                                                    <h1>Social media</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">WhatsApp:</label>
                                                        <input type="text" class="form-control" name="whatsapp"
                                                            value="<?php echo ($row_Recordset1['whatsapp']); ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Facebook:</label>
                                                        <input type="text" class="form-control" name="facebook"
                                                            value="<?php echo ($row_Recordset1['facebook']); ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Instagram:</label>
                                                        <input type="text" class="form-control" name="instagram"
                                                            value="<?php echo ($row_Recordset1['instagram']); ?>">
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                        <label class="lb">Linkedin:</label>
                                                        <input type="text" class="form-control" name="linkedin"
                                                            value="<?php echo ($row_Recordset1['linkedin']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--END PROFILE BIO-->
                                            <!--PROFILE BIO-->
                                            <div class="edit-pro-parti">
                                                <div class="form-tit">
                                                    <h4>interests</h4>
                                                    <h1>Hobbies</h1>
                                                </div>
                                                <div class="chosenini">
                                                    <div class="form-group">
                                                        <select class="chosen-select" name="hobbies"
                                                            data-placeholder="Select your Hobbies" multiple>
                                                            <option></option>
                                                            <option value="Modelling"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Modelling') ? 'selected' : ''; ?>>
                                                                Modelling </option>
                                                            <option value="Watching"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Watching') ? 'selected' : ''; ?>>
                                                                Watching </option>
                                                            <option value="movies"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'movies') ? 'selected' : ''; ?>>
                                                                movies </option>
                                                            <option value="Playing"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Playing') ? 'selected' : ''; ?>>
                                                                Playing </option>
                                                            <option value="volleyball"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'volleyball') ? 'selected' : ''; ?>>
                                                                volleyball</option>
                                                            <option value="Hangout with family"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Hangout with family') ? 'selected' : ''; ?>>
                                                                Hangout with family </option>
                                                            <option value="Adventure travel"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Adventure travel') ? 'selected' : ''; ?>>
                                                                Adventure travel </option>
                                                            <option value="Books reading"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Books reading') ? 'selected' : ''; ?>>
                                                                Books reading </option>
                                                            <option value="Music"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Music') ? 'selected' : ''; ?>>
                                                                Music </option>
                                                            <option value="Cooking"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Cooking') ? 'selected' : ''; ?>>
                                                                Cooking </option>
                                                            <option value="Yoga"
                                                                <?php echo ($row_Recordset1['hobbies'] == 'Yoga') ? 'selected' : ''; ?>>
                                                                Yoga</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--END PROFILE BIO-->
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <input type="hidden" name="MM_update" value="form1">
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

    <script>
    $(document).ready(function() {
        // Country/State/City handling
        const $countryDropdown = $('#country-select');
        const $stateDropdown = $('#state-dropdown');
        const $stateInput = $('#state-input');
        const $citySelect = $('select[name="city"]');
        const $cityInput = $('input[name="city_text"]');
        const $finalState = $('#final_state');
        const $finalCity = $('#final_city');

        // Add country change handler
        $countryDropdown.on('change', function() {
            if ($(this).val() == "India") {
                $stateDropdown.show();
                $stateInput.hide();
                $citySelect.show();
                $cityInput.hide();
                // Reset values
                $finalState.val($('select[name="state"]').val());
                $finalCity.val($citySelect.val());
            } else {
                $stateDropdown.hide();
                $stateInput.show();
                $citySelect.hide();
                $cityInput.show();
                // Reset values
                $finalState.val($('input[name="state_text"]').val());
                $finalCity.val($cityInput.val());
            }
        });

        // Initial state based on current country
        if ($countryDropdown.val() == "India") {
            $stateDropdown.show();
            $stateInput.hide();
            $citySelect.show();
            $cityInput.hide();
            // Set initial values for India
            $finalState.val($('select[name="state"]').val());
            $finalCity.val($citySelect.val());
        } else {
            $stateDropdown.hide();
            $stateInput.show();
            $citySelect.hide();
            $cityInput.show();
            // Set initial values for other countries
            $finalState.val($('input[name="state_text"]').val());
            $finalCity.val($cityInput.val());
        }

        // Handle changes to any state/city field
        $('select[name="state"], input[name="state_text"]').on('change', function() {
            $finalState.val($(this).val());
        });

        $('select[name="city"], input[name="city_text"]').on('change', function() {
            $finalCity.val($(this).val());
        });

        // State change handler for India
        $('select[name="state"]').on('change', function() {
            const selectedState = $(this).val();
            if (selectedState) {
                $.ajax({
                    url: "fetch_cities.php",
                    type: "POST",
                    data: {
                        state: selectedState
                    },
                    success: function(output) {
                        $citySelect.html(output).show();
                        $finalCity.val($citySelect.val());
                    },
                    error: function() {
                        alert("Failed to fetch cities. Please try again.");
                    }
                });
            } else {
                $citySelect.html('<option value="">Select City</option>');
                $finalCity.val('');
            }
        });

        // Caste/Religion handling
        const castesByReligion = {
            'Hindu': [
                'Brahmin', 'Kshatriya', 'Vaishya', 'Shudra',
                'Aggarwal', 'Arora', 'Baniya', 'Bhumihar', 'Gujjar', 'Jat',
                'Kayastha', 'Khatri', 'Kurmi', 'Rajput', 'Yadav',
                'Iyer', 'Iyengar', 'Lingayat', 'Mudaliar', 'Nair', 'Naidu',
                'Pillai', 'Reddy', 'Vokkaliga', 'Maratha', 'Kunbi'
            ],
            'Muslim': ['Sheikh', 'Syed', 'Pathan', 'Mughal'],
            'Christianity': ['Roman Catholic', 'Protestant', 'Syrian Christian', 'Other Christian'],
            'Sikhism': ['Jat Sikh', 'Khatri Sikh', 'Ramgharia', 'Other Sikh'],
            'Buddhism': ['Mahayana', 'Theravada', 'Vajrayana', 'Other Buddhist'],
            'Jainism': ['Digambar', 'Shvetambar', 'Other Jain'],
            'Zoroastrianism': ['Parsi', 'Irani'],
            'Tribal Religions': ['Various Tribal Groups']
        };

        const subcastesByCaste = {
            'Brahmin': ['Adi Gaur', 'Agarwal', 'Aiyer', 'Bhumihar', 'Chitpavan', 'Deshastha', 'Garhwali',
                'Goswami', 'Havyaka', 'Iyer', 'Kokanastha', 'Kanyakubja', 'Maithil', 'Nagar', 'Punjabi',
                'Saraswat', 'Saryuparin', 'Tamil'
            ],
            'Kshatriya': ['Bundela', 'Bhatti', 'Chandel', 'Chauhan', 'Gaharwal', 'Kachwaha', 'Rathore',
                'Sisodiya', 'Solanki', 'Tomara'
            ],
            'Rajput': ['Chauhan', 'Rathore', 'Sisodia', 'Kachwaha', 'Parmar', 'Bhati', 'Jadeja', 'Gahlot',
                'Chandela'
            ],
            'Yadav': ['Ahir', 'Gwala', 'Krishnaut', 'Nandavanshi', 'Yaduvanshi'],
            'Maratha': ['Kunbi', '96 Kuli', 'Deshmukh', 'Patil', 'Bhosale', 'Shirke', 'Jadhav']
        };

        const commonOptions = ['Other', 'Not Applicable', 'Prefer not to say'];

        function updateCasteOptions(selectedReligion) {
            const $casteSelect = $('#caste');
            const currentCaste = $casteSelect.val();

            $casteSelect.chosen('destroy');
            $casteSelect.empty();
            $casteSelect.append('<option value="">Select Caste</option>');

            if (selectedReligion && castesByReligion[selectedReligion]) {
                castesByReligion[selectedReligion].forEach(caste => {
                    const selected = (caste === currentCaste) ? 'selected' : '';
                    $casteSelect.append(`<option value="${caste}" ${selected}>${caste}</option>`);
                });
            }

            commonOptions.forEach(option => {
                const selected = (option === currentCaste) ? 'selected' : '';
                $casteSelect.append(`<option value="${option}" ${selected}>${option}</option>`);
            });

            $casteSelect.chosen({
                allow_single_deselect: true,
                width: '100%'
            });

            updateSubcasteOptions($casteSelect.val());
        }

        function updateSubcasteOptions(selectedCaste) {
            const $subcasteSelect = $('#subcast');
            const currentSubcaste = $subcasteSelect.val();

            $subcasteSelect.chosen('destroy');
            $subcasteSelect.empty();
            $subcasteSelect.append('<option value="">Select Subcaste</option>');

            if (selectedCaste && subcastesByCaste[selectedCaste]) {
                subcastesByCaste[selectedCaste].forEach(subcaste => {
                    const selected = (subcaste === currentSubcaste) ? 'selected' : '';
                    $subcasteSelect.append(
                        `<option value="${subcaste}" ${selected}>${subcaste}</option>`);
                });
            }

            commonOptions.forEach(option => {
                const selected = (option === currentSubcaste) ? 'selected' : '';
                $subcasteSelect.append(`<option value="${option}" ${selected}>${option}</option>`);
            });

            $subcasteSelect.chosen({
                allow_single_deselect: true,
                width: '100%'
            });
        }

        // Event handlers for religion and caste changes
        $('#religion').on('change', function() {
            updateCasteOptions($(this).val());
        });

        $('#caste').on('change', function() {
            updateSubcasteOptions($(this).val());
        });

        // Initialize caste options on page load
        const initialReligion = $('#religion').val();
        if (initialReligion) {
            updateCasteOptions(initialReligion);
        }
    });
    </script>

</body>

</html>