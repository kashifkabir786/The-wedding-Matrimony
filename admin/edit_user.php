<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$flag = false;
if ( isset( $_GET[ 'user_id' ] ) ) {
    $user_id = $_GET[ 'user_id' ];

    $query_Recordset2 = "SELECT u.*, s.status 
                         FROM user u
                         LEFT JOIN (
                             SELECT user_id, status 
                             FROM subscription 
                             WHERE user_id = '$user_id'
                             ORDER BY subscription_id DESC 
                             LIMIT 1
                         ) s ON u.user_id = s.user_id
                         WHERE u.user_id = '$user_id'";
    //$query_Recordset2 = "SELECT * FROM user WHERE user_id = '$user_id'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $flag = true;
}
    
if ( isset( $_GET[ 'success' ] ) && $_GET[ 'success' ] == "Added" ) {
    $query_Recordset2 = "SELECT * FROM user ORDER BY user_id DESC LIMIT 1";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
    $user_id = $row_Recordset2[ 'user_id' ];
    $flag = true;
}

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}

//updating project
if ( ( isset( $_POST[ "MM_update" ] ) ) && ( $_POST[ "MM_update" ] == "form1" ) ) {

   $updateSQL = sprintf("UPDATE user SET mname = %s, mobile2 = %s, gender = %s, city = %s, dob = %s, age = %s, height = %s, weight = %s, fathername = %s, mothername = %s, brothers = %s, sisters = %s, mothertongue = %s, religion = %s, caste = %s, subcast = %s, manglik = %s, occupation = %s, income = %s, education = %s, children = %s, country = %s, state = %s, village = %s, marriage_status = %s, hobbies = %s, about = %s, degree = %s, position = %s, company = %s, job = %s, address = %s, whatsapp = %s, instagram = %s, facebook = %s, linkedin = %s WHERE user_id = %s",
                       GetSQLValueString($_POST['mname'], "text"),
                       GetSQLValueString($_POST['mobile2'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
					   GetSQLValueString($_POST['dob'], "date"),
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
					   GetSQLValueString($_POST['state'], "text"),
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
					   GetSQLValueString($row_Recordset2['user_id'], "text"));
  		$Result1 = mysqli_query($theweddingmatrimony, $updateSQL) or die(mysqli_error($theweddingmatrimony));

    $insertGoTo = "edit_user.php?success=Updated";
    if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
    }
    header( sprintf( "Location: %s", $insertGoTo ) );
}

//update photo
if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form2" ) ) {

  $target = "../images/profiles/";
  $randno = rand( 100, 1000 );
  $target = $target . $randno . "-" . basename( $_FILES[ 'photo' ][ 'name' ] );
  $imageFileType = pathinfo( $target, PATHINFO_EXTENSION );
  // Allow certain file formats
  if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else if ( strpos( strtolower( $_FILES[ 'photo' ][ 'name' ] ), 'php' ) !== false || strpos( strtolower( $_FILES[ 'photo' ][ 'name' ] ), 'js' ) !== false ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else {
    $pic = $randno . "-" . ( $_FILES[ 'photo' ][ 'name' ] );

    //Writes the photo to the server
    if ( move_uploaded_file( $_FILES[ 'photo' ][ 'tmp_name' ], $target ) ) {
      $insertSQL = sprintf( "UPDATE `user` SET `photo` = %s WHERE user_id = %s",
        GetSQLValueString( $pic, "text" ),
        GetSQLValueString( $_POST[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "edit_user.php?success=Photo Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
}

//update photo
if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form3" ) ) {

  $target = "../images/profiles/";
  $randno = rand( 100, 1000 );
  $target = $target . $randno . "-" . basename( $_FILES[ 'photo2' ][ 'name' ] );
  $imageFileType = pathinfo( $target, PATHINFO_EXTENSION );
  // Allow certain file formats
  if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else if ( strpos( strtolower( $_FILES[ 'photo2' ][ 'name' ] ), 'php' ) !== false || strpos( strtolower( $_FILES[ 'photo2' ][ 'name' ] ), 'js' ) !== false ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else {
    $pic = $randno . "-" . ( $_FILES[ 'photo2' ][ 'name' ] );

    //Writes the photo to the server
    if ( move_uploaded_file( $_FILES[ 'photo2' ][ 'tmp_name' ], $target ) ) {
      $insertSQL = sprintf( "UPDATE `user` SET `photo2` = %s WHERE user_id = %s",
        GetSQLValueString( $pic, "text" ),
        GetSQLValueString( $_POST[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "edit_user.php?success=Photo Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
}
//update photo
if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form4" ) ) {

  $target = "../images/profiles/";
  $randno = rand( 100, 1000 );
  $target = $target . $randno . "-" . basename( $_FILES[ 'photo3' ][ 'name' ] );
  $imageFileType = pathinfo( $target, PATHINFO_EXTENSION );
  // Allow certain file formats
  if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else if ( strpos( strtolower( $_FILES[ 'photo3' ][ 'name' ] ), 'php' ) !== false || strpos( strtolower( $_FILES[ 'photo3' ][ 'name' ] ), 'js' ) !== false ) {
    $error[] = "Sorry, File is not an image. Please upload jpg, png or gif files only";
  } else {
    $pic = $randno . "-" . ( $_FILES[ 'photo3' ][ 'name' ] );

    //Writes the photo to the server
    if ( move_uploaded_file( $_FILES[ 'photo3' ][ 'tmp_name' ], $target ) ) {
      $insertSQL = sprintf( "UPDATE `user` SET `photo3` = %s WHERE user_id = %s",
        GetSQLValueString( $pic, "text" ),
        GetSQLValueString( $_POST[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "edit_user.php?success=Photo Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit User | The Wedding Matrimony</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"> <a
                    class="navbar-brand brand-logo" href="home.php"><img src="../images/logo1.png" alt="logo"
                        style="width: auto; height: 50px;" /></a> </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span> </button>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include('header.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2"> <i
                                    class="mdi mdi-office"></i> </span> Edit User </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 mb-1"> <a href="user.php">
                                                <button type="button"
                                                    class="btn btn-gradient-primary btn-rounded btn-fw"><i
                                                        class="mdi mdi-arrow-left menu-icon"></i> &nbsp;Back</button>
                                            </a> </div>
                                        <?php if($row_Recordset2['status'] == 'Expired' || $row_Recordset2['status'] == NULL) { ?>
                                        <div class="col-md-3 mb-1"> <a
                                                href="user_subscription.php?user_id=<?php echo $row_Recordset2['user_id']; ?>">
                                                <button type="button"
                                                    class="btn btn-gradient-primary btn-rounded btn-fw">Add
                                                    Payment&nbsp;<i class="mdi mdi-arrow-right menu-icon"></i></button>
                                            </a> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
        if ( isset( $_GET[ 'success' ] ) ) {
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-success">User ' . $_GET[ 'success' ] . ' Successfully</div>';
            echo '</div>';
        }
        ?>

                    <?php
      if ( isset( $_GET[ 'success' ] ) || $flag ) {
        ?>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Photo</h4>
                                        <div class="col-md-6"> <img
                                                src="../images/profiles/<?php echo $row_Recordset2['photo'] ?>"
                                                width="100%" class="img-thumbnail"> </div>
                                        <div class="col-md-3">
                                            <form action="<?php echo $editFormAction; ?>" method="POST"
                                                enctype="multipart/form-data" name="form2" role="form">
                                                <div class="form-group">
                                                    <label class="control-label mt-3" for="photo">Select Photo</label>
                                                    <input type="file" name="photo" id="photo" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="upload"
                                                        class="btn btn-gradient-primary btn-fw">Upload</button>
                                                    <input type="hidden" name="user_id"
                                                        value="<?php echo $row_Recordset2['user_id'] ?>" />
                                                    <input type="hidden" name="MM_photo" value="form2">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4>Photo2</h4>
                                        <div class="col-md-6"> <img
                                                src="../images/profiles/<?php echo $row_Recordset2['photo2'] ?>"
                                                width="100%" class="img-thumbnail"> </div>
                                        <div class="col-md-3">
                                            <form action="<?php echo $editFormAction; ?>" method="POST"
                                                enctype="multipart/form-data" name="form3" role="form">
                                                <div class="form-group mt-3">
                                                    <label class="control-label" for="icon">Select Photo</label>
                                                    <input type="file" name="photo2" id="photo2" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="upload"
                                                        class="btn btn-gradient-primary btn-fw">Upload</button>
                                                    <input type="hidden" name="user_id"
                                                        value="<?php echo $row_Recordset2['user_id'] ?>" />
                                                    <input type="hidden" name="MM_photo" value="form3">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Photo3</h4>
                                        <div class="col-md-6"> <img
                                                src="../images/profiles/<?php echo $row_Recordset2['photo3'] ?>"
                                                width="100%" class="img-thumbnail"> </div>
                                        <div class="col-md-3">
                                            <form action="<?php echo $editFormAction; ?>" method="POST"
                                                enctype="multipart/form-data" name="form4" role="form">
                                                <div class="form-group mt-3">
                                                    <label class="control-label" for="icon">Select Photo</label>
                                                    <input type="file" name="photo3" id="photo3" />
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" id="upload"
                                                        class="btn btn-gradient-primary btn-fw">Upload</button>
                                                    <input type="hidden" name="user_id"
                                                        value="<?php echo $row_Recordset2['user_id'] ?>" />
                                                    <input type="hidden" name="MM_photo" value="form4">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" name="form1" role="form" action="<?php echo $editFormAction;?>">
                                        <div class="row">
                                            <div class="col-4 mt-4">
                                                <div class="form-group">
                                                    <label>Name:</label>
                                                    <input type="text" class="form-control" id="mname" name="mname"
                                                        value="<?php echo $row_Recordset2['mname'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4 mt-4">
                                                <div class="form-group">
                                                    <label>Mobile:</label>
                                                    <input type="number" class="form-control" id="mobile" name="mobile"
                                                        value="<?php echo $row_Recordset2['mobile'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4 mt-4">
                                                <div class="form-group">
                                                    <label>Mobile2:</label>
                                                    <input type="number" class="form-control" id="mobile2"
                                                        name="mobile2" value="<?php echo $row_Recordset2['mobile2'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Gender:</label>
                                                <select class="form-select chosen-select" name="gender"
                                                    data-placeholder="Select your Gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Man"
                                                        <?php echo ($row_Recordset2['gender'] == 'Man') ? 'selected' : ''; ?>>
                                                        Man</option>
                                                    <option value="Woman"
                                                        <?php echo ($row_Recordset2['gender'] == 'Woman') ? 'selected' : ''; ?>>
                                                        Woman</option>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Date of birth:</label>
                                                <input type="date" class="form-control" name="dob"
                                                    value="<?php echo $row_Recordset2['dob']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Age:</label>
                                                <input type="number" class="form-control" name="age"
                                                    value="<?php echo $row_Recordset2['age']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Mother Tongue:</label>
                                                <input type="text" class="form-control" name="mothertongue"
                                                    value="<?php echo $row_Recordset2['mothertongue']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Fathers name:</label>
                                                <input type="text" class="form-control" name="fathername"
                                                    value="<?php echo $row_Recordset2['fathername']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Mothers name:</label>
                                                <input type="text" class="form-control" name="mothername"
                                                    value="<?php echo $row_Recordset2['mothername']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Brothers:</label>
                                                <input type="text" class="form-control" name="brothers"
                                                    value="<?php echo $row_Recordset2['brothers']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Sisters:</label>
                                                <input type="text" class="form-control" name="sisters"
                                                    value="<?php echo $row_Recordset2['sisters']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Height:</label>
                                                <input type="text" class="form-control" name="height"
                                                    value="<?php echo $row_Recordset2['height']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Weight:</label>
                                                <input type="text" class="form-control" name="weight"
                                                    value="<?php echo $row_Recordset2['weight']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Income:</label>
                                                <input type="text" class="form-control" name="income"
                                                    value="<?php echo $row_Recordset2['income']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Religion:</label>
                                                <input type="text" class="form-control" name="religion"
                                                    value="<?php echo $row_Recordset2['religion']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Caste:</label>
                                                <select class="form-select chosen-select" name="caste"
                                                    data-placeholder="Select your Caste">
                                                    <option value="">Select Caste</option>
                                                    <option value="Brahmin"
                                                        <?php echo ($row_Recordset2['caste'] == 'Brahmin') ? 'selected' : ''; ?>>
                                                        Brahmin</option>
                                                    <option value="Kshatriya"
                                                        <?php echo ($row_Recordset2['caste'] == 'Kshatriya') ? 'selected' : ''; ?>>
                                                        Kshatriya</option>
                                                    <option value="Vaishya"
                                                        <?php echo ($row_Recordset2['caste'] == 'Vaishya') ? 'selected' : ''; ?>>
                                                        Vaishya</option>
                                                    <option value="Shudra"
                                                        <?php echo ($row_Recordset2['caste'] == 'Shudra') ? 'selected' : ''; ?>>
                                                        Shudra</option>
                                                    <option value="Jat"
                                                        <?php echo ($row_Recordset2['caste'] == 'Jat') ? 'selected' : ''; ?>>
                                                        Jat</option>
                                                    <option value="Yadav"
                                                        <?php echo ($row_Recordset2['caste'] == 'Yadav') ? 'selected' : ''; ?>>
                                                        Yadav</option>
                                                    <option value="Rajput"
                                                        <?php echo ($row_Recordset2['caste'] == 'Rajput') ? 'selected' : ''; ?>>
                                                        Rajput</option>
                                                    <option value="Scheduled Castes (Dalit, etc.)"
                                                        <?php echo ($row_Recordset2['caste'] == 'Scheduled Castes (Dalit, etc.)') ? 'selected' : ''; ?>>
                                                        Scheduled Castes (Dalit, etc.)</option>
                                                    <option value="Scheduled Tribes"
                                                        <?php echo ($row_Recordset2['caste'] == 'Scheduled Tribes') ? 'selected' : ''; ?>>
                                                        Scheduled Tribes</option>
                                                    <option value="Other Backward Classes (OBCs)"
                                                        <?php echo ($row_Recordset2['caste'] == 'Other Backward Classes (OBCs)') ? 'selected' : ''; ?>>
                                                        Other Backward Classes (OBCs)</option>
                                                    <option value="Maratha"
                                                        <?php echo ($row_Recordset2['caste'] == 'Maratha') ? 'selected' : ''; ?>>
                                                        Maratha</option>
                                                    <option value="Lingayat"
                                                        <?php echo ($row_Recordset2['caste'] == 'Lingayat') ? 'selected' : ''; ?>>
                                                        Lingayat</option>
                                                    <option value="Kayastha"
                                                        <?php echo ($row_Recordset2['caste'] == 'Kayastha') ? 'selected' : ''; ?>>
                                                        Kayastha</option>
                                                    <option value="Reddy"
                                                        <?php echo ($row_Recordset2['caste'] == 'Reddy') ? 'selected' : ''; ?>>
                                                        Reddy</option>
                                                    <option value="Vokkaliga"
                                                        <?php echo ($row_Recordset2['caste'] == 'Vokkaliga') ? 'selected' : ''; ?>>
                                                        Vokkaliga</option>
                                                    <option value="Nair"
                                                        <?php echo ($row_Recordset2['caste'] == 'Nair') ? 'selected' : ''; ?>>
                                                        Nair</option>
                                                    <option value="Ezhava"
                                                        <?php echo ($row_Recordset2['caste'] == 'Ezhava') ? 'selected' : ''; ?>>
                                                        Ezhava</option>
                                                    <option value="Sayed"
                                                        <?php echo ($row_Recordset2['caste'] == 'Sayed') ? 'selected' : ''; ?>>
                                                        Sayed</option>
                                                    <option value="Shia"
                                                        <?php echo ($row_Recordset2['caste'] == 'Shia') ? 'selected' : ''; ?>>
                                                        Shia</option>
                                                    <option value="Mallick"
                                                        <?php echo ($row_Recordset2['caste'] == 'Mallick') ? 'selected' : ''; ?>>
                                                        Mallick</option>
                                                    <option value="Gujjar"
                                                        <?php echo ($row_Recordset2['caste'] == 'Gujjar') ? 'selected' : ''; ?>>
                                                        Gujjar</option>
                                                    <option value="Sudhi Baniya"
                                                        <?php echo ($row_Recordset2['caste'] == 'Sudhi Baniya') ? 'selected' : ''; ?>>
                                                        Sudhi Baniya</option>
                                                    <option value="Kurmi"
                                                        <?php echo ($row_Recordset2['caste'] == 'Kurmi') ? 'selected' : ''; ?>>
                                                        Kurmi</option>
                                                    <option value="KamKunj Brahman"
                                                        <?php echo ($row_Recordset2['caste'] == 'KamKunj Brahman') ? 'selected' : ''; ?>>
                                                        KamKunj Brahman</option>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Subcast:</label>
                                                <input type="text" class="form-control" name="subcast"
                                                    value="<?php echo $row_Recordset2['subcast']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Manglik:</label>
                                                <input type="text" class="form-control" name="manglik"
                                                    value="<?php echo $row_Recordset2['manglik']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Occupation:</label>
                                                <input type="text" class="form-control" name="occupation"
                                                    value="<?php echo $row_Recordset2['occupation']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Education:</label>
                                                <input type="text" class="form-control" name="education"
                                                    value="<?php echo $row_Recordset2['education']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Job:</label>
                                                <select class="form-control chosen-select" name="job">
                                                    <option value="">Select Job Status</option>
                                                    <option value="Working"
                                                        <?php if ($row_Recordset2['job'] == 'Working') echo 'selected'; ?>>
                                                        Working</option>
                                                    <option value="Not Working"
                                                        <?php if ($row_Recordset2['job'] == 'Not Working') echo 'selected'; ?>>
                                                        Not Working</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Children:</label>
                                                <input type="text" class="form-control" name="children"
                                                    value="<?php echo $row_Recordset2['children']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Country:</label>
                                                <input type="text" class="form-control" name="country"
                                                    value="<?php echo $row_Recordset2['country']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">State:</label>
                                                <select name="state" class="form-control chosen-select" id="state"
                                                    onchange="fetchCities(this.value)">
                                                    <option value="">Select State</option>
                                                    <?php
                                                            if (isset($states_data['geonames'])) {
                                                                foreach ($states_data['geonames'] as $state) {
                                                                    echo "<option value='" . $state['geonameId'] . "'>" . $state['name'] . "</option>";
                                                                }
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">City:</label>
                                                <select name="city" class="form-control chosen-select" id="city">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Village:</label>
                                                <input type="text" class="form-control" name="village"
                                                    value="<?php echo $row_Recordset2['village']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Marriage status:</label>
                                                <select class="form-control chosen-select" name="marriage_status">
                                                    <option value="">Select Marriage Status</option>
                                                    <option value="Single"
                                                        <?php if ($row_Recordset2['marriage_status'] == 'Single') echo 'selected'; ?>>
                                                        Single</option>
                                                    <option value="Married"
                                                        <?php if ($row_Recordset2['marriage_status'] == 'Married') echo 'selected'; ?>>
                                                        Married</option>
                                                    <option value="Divorced"
                                                        <?php if ($row_Recordset2['marriage_status'] == 'Divorced') echo 'selected'; ?>>
                                                        Divorced</option>
                                                    <option value="Widowed"
                                                        <?php if ($row_Recordset2['marriage_status'] == 'Widowed') echo 'selected'; ?>>
                                                        Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Address:</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="<?php echo $row_Recordset2['address']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Degree:</label>
                                                <input type="text" class="form-control" name="degree"
                                                    value="<?php echo $row_Recordset2['degree']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Company:</label>
                                                <input type="text" class="form-control" name="company"
                                                    value="<?php echo $row_Recordset2['company']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Position:</label>
                                                <input type="text" class="form-control" name="position"
                                                    value="<?php echo $row_Recordset2['position']; ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">WhatsApp:</label>
                                                <input type="text" class="form-control" name="whatsapp"
                                                    value="<?php echo ($row_Recordset2['whatsapp']); ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Facebook:</label>
                                                <input type="text" class="form-control" name="facebook"
                                                    value="<?php echo ($row_Recordset2['facebook']); ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group">
                                                <label class="lb">Instagram:</label>
                                                <input type="text" class="form-control" name="instagram"
                                                    value="<?php echo ($row_Recordset2['instagram']); ?>">
                                            </div>
                                            <div class="col-4 form-group">
                                                <label class="lb">Linkedin:</label>
                                                <input type="text" class="form-control" name="linkedin"
                                                    value="<?php echo ($row_Recordset2['linkedin']); ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label class="lb">About:</label>
                                                <textarea class="form-control"
                                                    name="about"><?php echo ($row_Recordset2['about']); ?></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-gradient-primary mt-4">Save</button>
                                        <input type="hidden" name="MM_update" value="form1">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between"> <span
                            class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyrights &copy;
                            2024 The Wedding Matrimony. All Rights Reserved </span></div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
</body>

</html>