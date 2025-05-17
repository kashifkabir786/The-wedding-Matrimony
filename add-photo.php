<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>

<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form1" ) ) {

  $target = "images/profiles/";
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
        GetSQLValueString( $row_Recordset1[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "add-photo.php?success=Image Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
}
if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form2" ) ) {

  $target = "images/profiles/";
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
        GetSQLValueString( $row_Recordset1[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "add-photo.php?success=Image Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
}

if ( ( isset( $_POST[ "MM_photo" ] ) ) && ( $_POST[ "MM_photo" ] == "form3" ) ) {

  $target = "images/profiles/";
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
        GetSQLValueString( $row_Recordset1[ 'user_id' ], "int" ) );
      $Result = mysqli_query( $theweddingmatrimony, $insertSQL )or die( mysqli_error( $theweddingmatrimony ) );

      $insertGoTo = "add-photo.php?success=Image Updated";
      if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
        $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
        $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
      }
      header( sprintf( "Location: %s", $insertGoTo ) );
    }
  }
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
                                echo '<div class="alert alert-success">Photo ' . $_GET[ 'success' ] . ' Successfully</div>';
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
                                                    <h1>Add my Photo (Minimum one photo )</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"> <img
                                                            src="images/profiles/<?php echo $row_Recordset1['photo'] ?>"
                                                            width="60%" class="img-thumbnail"> </div>
                                                    <div class="col-md-4">
                                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                                            enctype="multipart/form-data" name="form1" role="form">
                                                            <div class="form-group">
                                                                <label class="control-label" for="image">Select
                                                                    Image</label>
                                                                <input type="file" name="photo" id="photo" />
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" id="upload"
                                                                    class="btn btn-gradient-primary btn-fw">Upload</button>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo $row_Recordset1['user_id'] ?>" />
                                                                <input type="hidden" name="MM_photo" value="form1">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6"> <img
                                                            src="images/profiles/<?php echo $row_Recordset1['photo2'] ?>"
                                                            width="60%" class="img-thumbnail"> </div>
                                                    <div class="col-md-4">
                                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                                            enctype="multipart/form-data" name="form2" role="form">
                                                            <div class="form-group">
                                                                <label class="control-label" for="image">Select
                                                                    Image</label>
                                                                <input type="file" name="photo2" id="photo2" />
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" id="upload"
                                                                    class="btn btn-gradient-primary btn-fw">Upload</button>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo $row_Recordset1['user_id'] ?>" />
                                                                <input type="hidden" name="MM_photo" value="form2">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6"> <img
                                                            src="images/profiles/<?php echo $row_Recordset1['photo3'] ?>"
                                                            width="60%" class="img-thumbnail"> </div>
                                                    <div class="col-md-4">
                                                        <form action="<?php echo $editFormAction; ?>" method="POST"
                                                            enctype="multipart/form-data" name="form3" role="form">
                                                            <div class="form-group">
                                                                <label class="control-label" for="image">Select
                                                                    Image</label>
                                                                <input type="file" name="photo3" id="photo3" />
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" id="upload"
                                                                    class="btn btn-gradient-primary btn-fw">Upload</button>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo $row_Recordset1['user_id'] ?>" />
                                                                <input type="hidden" name="MM_photo" value="form3">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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