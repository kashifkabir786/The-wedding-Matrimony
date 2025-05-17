<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session.php'); ?>
<?php
$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
    $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}
$flag = true;

$errpass1 = $errpass2 = $errpass = "";

if ( ( isset( $_POST[ "MM_update" ] ) ) && ( $_POST[ "MM_update" ] == "form1" ) ) {

    $query_Recordset2 = "SELECT password FROM user WHERE user_id = '{$row_Recordset1['user_id']}'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );

    $hash = $row_Recordset2[ 'password' ];
    if ( empty( $_POST[ 'password' ] ) )
        $errpass1 = "Please Enter Password";
    if ( empty( $_POST[ 'rpassword' ] ) )
        $errpass2 = "Please Retype Password";
    if ( $_POST[ 'password' ] != $_POST[ 'rpassword' ] )
        $errpass = "Passwords Don't Match";

    if ( empty( $errpass3 ) && empty( $errpass1 ) && empty( $errpass2 ) && empty( $errpass ) ) {
        $password = $_POST[ 'password' ];
        $hash = password_hash( $password, PASSWORD_DEFAULT );

        $updateSQL = sprintf( "UPDATE `user` SET `password` = '$hash' WHERE `user_id` = %s", GetSQLValueString( $_POST[ 'user_id' ], "text" ) );

        $Result1 = mysqli_query( $theweddingmatrimony, $updateSQL )or die( mysqli_error( $theweddingmatrimony ) );

        unset( $_SESSION[ 'user_id' ] );

        $insertGoTo = "user-setting.php?sucess=Updated";
        if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
            $insertGoTo .= ( strpos( $insertGoTo, '?' ) ) ? "&" : "?";
            $insertGoTo .= $_SERVER[ 'QUERY_STRING' ];
        }
        header( sprintf( "Location: %s", $insertGoTo ) );
    }

}

//   $query_Recordset3 = "SELECT * FROM user WHERE user_id = '{$row_Recordset1['user_id']}'";
//   $Recordset3 = mysqli_query( $theweddingmatrimony, $query_Recordset3 )or die( mysqli_error( $theweddingmatrimony ) );
//   $row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
//   $totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );
 

if ( ( isset( $_POST[ "MM_update" ] ) ) && ( $_POST[ "MM_update" ] == "form2" ) ) {

  $query_Recordset4 = "SELECT email FROM user WHERE user_id = '{$row_Recordset1['user_id']}'";
  $Recordset4 = mysqli_query( $theweddingmatrimony, $query_Recordset4 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset4 = mysqli_fetch_assoc( $Recordset4 );
  $totalRows_Recordset4 = mysqli_num_rows( $Recordset4 );
  
       $updateSQL = sprintf("UPDATE `user` SET `email` = %s, mobile = %s WHERE `user_id` = %s",
        GetSQLValueString($_POST['email'], "text"),
        GetSQLValueString($_POST['mobile'], "text"),
        GetSQLValueString($_POST['user_id'], "int") );

        $Result1 = mysqli_query( $theweddingmatrimony, $updateSQL )or die( mysqli_error( $theweddingmatrimony ) );

        unset( $_SESSION[ 'user_id' ] );

        $insertGoTo = "login.php?sucess=Updated";
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
                                    <li><a href="user-plan.php"><i class="fa fa-money" aria-hidden="true"></i>My
                                            Plan</a>
                                    </li>
                                    <li><a href="user-setting.php" class="act"><i class="fa fa-cog"
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
                                <h2 class="db-tit">Profile settings</h2>
                                <div class="col7 fol-set-rhs">
                                    <!--START-->
                                    <div class="ms-write-post fol-sett-sec sett-rhs-pro" style="">
                                        <div class="foll-set-tit fol-pro-abo-ico">
                                            <h4>Profile</h4>
                                        </div>
                                        <div class="fol-sett-box">
                                            <ul>
                                                <li>
                                                    <div class="sett-lef">
                                                        <div class="auth-pro-sm sett-pro-wid">
                                                            <div class="auth-pro-sm-img">
                                                                <?php if ($row_Recordset1['photo2']) { ?>
                                                                <img src="images/profiles/<?php echo $row_Recordset1['photo2']; ?>"
                                                                    alt="" loading="lazy">
                                                                <?php } else { ?>
                                                                <img src="images/profiles/dummy-profile.png" alt="">
                                                                <?php } ?>
                                                            </div>
                                                            <div class="auth-pro-sm-desc">
                                                                <h5><?php echo $row_Recordset1['mname']; ?></h5>
                                                                <!-- <p>Premium user | Illunois</p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <a href="logout.php" class="set-sig-out">Sign Out</a>
                                                    </div>
                                                </li>
                                                <!-- <li>
                                                    <div class="sett-lef">
                                                        <div class="sett-rad-left">
                                                            <h5>Profile visible</h5>
                                                            <p>You can set-up who can able to view your profile.</p>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <div class="sett-select-drop">
                                                            <select>
                                                                <option value="All users">All users</option>
                                                                <option value="Premium">Premium</option>
                                                                <option value="Free">Free</option>
                                                                <option value="Free">No-more visible(You can't visible,
                                                                    so no one can view your profile)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sett-lef">
                                                        <div class="sett-rad-left">
                                                            <h5>Who can send you Interest requests?</h5>
                                                            <p>You can set-up who can able to make Interest request
                                                                here.</p>
                                                        </div>
                                                    </div>
                                                    <div class="sett-rig">
                                                        <div class="sett-select-drop">
                                                            <select>
                                                                <option value="All users">All users</option>
                                                                <option value="Premium">Premium</option>
                                                                <option value="Free">Free</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <!--END-->
                                    <!-- START -->
                                    <div class="ms-write-post fol-sett-sec sett-rhs-acc" style="">
                                        <div class="foll-set-tit fol-pro-abo-ico">
                                            <h4>Account</h4>
                                            <a href="javascript:void(0);" class="sett-edit-btn sett-acc-edit-eve"
                                                id="edit-button" onclick="toggleEditMode()">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                            </a>
                                        </div>
                                        <div class="fol-sett-box sett-acc-view sett-two-tab" id="view-mode">
                                            <ul>
                                                <li>
                                                    <div>Full name</div>
                                                    <div><?php echo $row_Recordset1['mname']; ?></div>
                                                </li>
                                                <li>
                                                    <div>Mobile</div>
                                                    <div><?php echo $row_Recordset1['mobile']; ?></div>
                                                </li>
                                                <li>
                                                    <div>Email id</div>
                                                    <div><?php echo $row_Recordset1['email']; ?></div>
                                                </li>
                                                <li>
                                                    <div>Password</div>
                                                    <div>**********</div>
                                                </li>
                                                <!-- <li>
                                                    <div>Profile type</div>
                                                    <div>Platinum</div>
                                                </li> -->
                                            </ul>
                                        </div>
                                        <div class="sett-acc-edit" id="edit-mode" style="display: none;">
                                            <form id="form2" name="form2" action="<?php echo $editFormAction; ?>"
                                                method="POST" role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="fm-lab form-group">Email id</div>
                                                        <div class="fm-fie">
                                                            <input type="text" class="form-control" name="email"
                                                                value="<?php echo $row_Recordset1['email']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="fm-lab form-group">Mobile</div>
                                                        <div class="fm-fie">
                                                            <input type="text" class="form-control" name="mobile"
                                                                value="<?php echo $row_Recordset1['mobile']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Update" class="update-btn mt-3">
                                                <input type="hidden" name="user_id"
                                                    value="<?php echo $row_Recordset1['user_id'] ?>" />
                                                <input type="hidden" name="MM_update" value="form2">
                                            </form>
                                            <hr class="mt-5">
                                            <form id="form1" name="form1" action="<?php echo $editFormAction; ?>"
                                                method="POST" role="form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="fm-lab form-group mt-3 col-md-6">Password<span
                                                                class="text-warning">* <?php echo $errpass1; ?></span>
                                                        </div>
                                                        <div class="fm-fie">
                                                            <input type="password" class="form-control" name="password"
                                                                value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="fm-lab form-group col-md-6 mt-3">Confirm
                                                            password<span class="text-warning">*
                                                                <?php echo $errpass2; ?></span></div>
                                                        <div class="fm-fie">
                                                            <input type="password" class="form-control" name="rpassword"
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Update" class="update-btn mt-3">
                                                <input type="button" value="Cancel" class="update-btn"
                                                    onclick="toggleEditMode()">
                                                <input type="hidden" name="user_id"
                                                    value="<?php echo $row_Recordset1['user_id'] ?>" />
                                                <input type="hidden" name="MM_update" value="form1">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- END -->

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
    <script>
    function toggleEditMode() {
        var viewMode = document.getElementById('view-mode');
        var editMode = document.getElementById('edit-mode');
        var editButton = document.getElementById('edit-button');

        if (viewMode.style.display === 'none') {
            viewMode.style.display = 'block';
            editMode.style.display = 'none';
            editButton.style.display = 'inline-block';
        } else {
            viewMode.style.display = 'none';
            editMode.style.display = 'block';
            editButton.style.display = 'none';
        }
    }
    </script>



</body>

</html>