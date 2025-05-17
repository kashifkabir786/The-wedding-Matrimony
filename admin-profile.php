<?php require_once('Connections/theweddingmatrimony.php'); ?>

<?php 

 if ( isset( $_GET[ 'user_id' ] ) ) {
    $user_id = $_GET[ 'user_id' ];

    $query_Recordset2 = "SELECT * FROM user WHERE user_id='$user_id'";
    $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
    $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
    $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
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

    <!-- PROFILE -->
    <section>
        <div class="profi-pg profi-ban">
            <div class="">
                <div class="">
                    <div class="profile">
                        <div class="pg-pro-big-im">
                            <div class="s1">
                                <img src="images/profiles/<?php echo $row_Recordset2['photo']; ?>" loading="lazy"
                                    class="pro" alt="">
                            </div>
                            <div class="s3">
                                <!-- <a href="#!" class="cta fol cta-chat">Chat now</a>
                                <form action="<?php echo $editFormAction;?>" method="POST" name="form" class="form">
                                    <button type="submit" id="sendInterestButton" class="cta cta-sendint"
                                        data-toggle="modal" data-target="#sendInter"
                                        <?php if ($interest_count >= 15) echo 'disabled'; ?>>
                                        Send
                                        Interest</button>
                                    <input type="hidden" name="sender_id"
                                        value="<?php echo $row_Recordset1['user_id']; ?>">
                                    <input type="hidden" name="receiver_id"
                                        value="<?php echo $row_Recordset2['user_id']; ?>">
                                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" name="MM_insert" value="form">
                                </form> -->
                            </div>
                        </div>
                    </div>

                    <div class="profi-pg profi-bio">
                        <div class="lhs">
                            <div class="pro-pg-intro">
                                <?php
                            if ( isset( $_GET[ 'success' ] ) ) {
                                echo '<div class="col-md-12">';
                                echo '<div class="alert alert-success">' . $_GET[ 'success' ] . ' </div>';
                                echo '</div>';
                            }
                            ?>
                                <h1><?php echo $row_Recordset2['mname']; ?></h1>
                                <div class="pro-info-status">
                                    <span class="stat-1"><b>100</b> viewers</span>
                                    <span class="stat-2"><b>Available</b> online</span>
                                </div>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>City: <strong><?php echo $row_Recordset2['city']; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-age.png" loading="lazy" alt="">
                                            <span>Age: <strong><?php echo $row_Recordset2['age']; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>Height:
                                                <strong><?php echo $row_Recordset2['height']; ?></strong></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/icon/pro-city.png" loading="lazy" alt="">
                                            <span>Job: <strong><?php echo $row_Recordset2['job']; ?></strong></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- PROFILE ABOUT -->
                            <?php if (!empty($row_Recordset2['facebook'])): ?>
                            <div class="pr-bio-c pr-bio-abo">
                                <h3>About</h3>
                                <p><?php echo $row_Recordset2['about']; ?></p>
                            </div>
                            <?php endif; ?>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-gal" id="gallery">
                                <h3>Photo gallery</h3>
                                <div id="image-gallery">
                                    <?php if (!empty($row_Recordset2['photo'])): ?>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="images/profiles/<?php echo $row_Recordset2['photo']; ?>"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($row_Recordset2['photo2'])): ?>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="images/profiles/<?php echo $row_Recordset2['photo2']; ?>"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($row_Recordset2['photo3'])): ?>
                                    <div class="pro-gal-imag">
                                        <div class="img-wrapper">
                                            <a href="#!"><img
                                                    src="images/profiles/<?php echo $row_Recordset2['photo3']; ?>"
                                                    class="img-responsive" alt=""></a>
                                            <div class="img-overlay"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-conta">
                                <h3>Contact info</h3>
                                <ul class="mt-4">
                                    <li><span><i class="fa fa-mobile"
                                                aria-hidden="true"></i><b>Phone:</b><?php echo $row_Recordset2['mobile']; ?></span>
                                    </li>
                                    <li><span><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i><b>Email:</b><?php echo $row_Recordset2['email']; ?></span>
                                    </li>
                                    <li><span><i class="fa fa fa-map-marker"
                                                aria-hidden="true"></i><b>Address:</b><?php echo $row_Recordset2['address']; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c pr-bio-info">
                                <h3>Personal information</h3>
                                <ul>
                                    <li><b>Name:</b> <?php echo $row_Recordset2['mname']; ?></li>
                                    <li><b>Fatheres name:</b> <?php echo $row_Recordset2['fathername']; ?></li>
                                    <li><b>Mother name:</b> <?php echo $row_Recordset2['mothername']; ?></li>
                                    <li><b>Age:</b> <?php echo $row_Recordset2['age']; ?></li>
                                    <li><b>Dob:</b><?php echo date('d M Y',strtotime($row_Recordset2['dob'])); ?>
                                    </li>
                                    <li><b>Height:</b> <?php echo $row_Recordset2['height']; ?></li>
                                    <li><b>Weight:</b> <?php echo $row_Recordset2['weight']; ?></li>
                                    <li><b>Degree:</b> <?php echo $row_Recordset2['degree']; ?></li>
                                    <li><b>Religion:</b> <?php echo $row_Recordset2['religion']; ?></li>
                                    <li><b>Profession:</b> <?php echo $row_Recordset2['job']; ?></li>
                                    <li><b>Company:</b> <?php echo $row_Recordset2['company']; ?></li>
                                    <li><b>Position:</b> <?php echo $row_Recordset2['position']; ?></li>
                                    <li><b>Income:</b> <?php echo $row_Recordset2['income']; ?></li>
                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <?php if (!empty($row_Recordset2['hobbies'])): ?>
                            <div class="pr-bio-c pr-bio-hob">
                                <h3>Hobbies</h3>
                                <ul>
                                    <li><span><?php echo $row_Recordset2['hobbies']; ?></span></li>
                                </ul>
                            </div>
                            <?php endif ?>
                            <!-- END PROFILE ABOUT -->
                            <!-- PROFILE ABOUT -->
                            <div class="pr-bio-c menu-pop-soci pr-bio-soc">
                                <h3>Social media</h3>
                                <ul>
                                    <?php if (!empty($row_Recordset2['facebook'])): ?>
                                    <li><a href="#!" target="_blank"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <?php endif ?>
                                    <?php if (!empty($row_Recordset2['whatsapp'])): ?>
                                    <li><a href="https://wa.me/<?php echo $row_Recordset2['whatsapp']; ?>"
                                            target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <?php endif ?>
                                    <?php if (!empty($row_Recordset2['linkedin'])): ?>
                                    <li><a href="#!" target="_blank"><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>
                                    <?php endif ?>
                                    <?php if (!empty($row_Recordset2['instagram'])): ?>
                                    <li><a href="#!" target="_blank"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                    <?php endif ?>

                                </ul>
                            </div>
                            <!-- END PROFILE ABOUT -->
                        </div>

                        <!-- PROFILE lHS -->
                        <div class="rhs">
                            <!-- HELP BOX -->
                            <div class="prof-rhs-help">
                                <div class="inn">
                                    <h3>Tell us your Needs</h3>
                                    <p>Tell us what kind of service or experts you are looking.</p>
                                    <a href="#">Register for free</a>
                                </div>
                            </div>
                            <!-- END HELP BOX -->
                            <!-- RELATED PROFILES -->

                            <!-- <div class="slid-inn pr-bio-c wedd-rel-pro">
                                <h3>Related profiles</h3>
                                <ul class="slider3">
                                    <?php if($totalRows_Recordset3 > 0 ){ ?>
                                    <?php do { ?>
                                    <li>
                                        <div class="wedd-rel-box">
                                            <div class="wedd-rel-img">
                                                <img src="images/profiles/<?php echo $row_Recordset3['photo']; ?>"
                                                    alt="">
                                                <span class="badge badge-success"><?php echo $row_Recordset3['age']; ?>
                                                    Years Old</span>
                                            </div>
                                            <div class="wedd-rel-con">
                                                <h5><?php echo $row_Recordset3['mname']; ?></h5>
                                                <span>City: <b><?php echo $row_Recordset3['city']; ?></b></span>
                                            </div>
                                            <a href="profile-details.php?user_id=<?php echo $row_Recordset3['user_id']; ?>"
                                                class="fclick"></a>
                                        </div>
                                    </li>
                                    <?php } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); } ?>
                                </ul>
                            </div> -->
                            <!-- END RELATED PROFILES -->
                        </div>
                        <!-- END PROFILE lHS -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PROFILE -->

    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename">Jolia</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="images/profiles/1.jpg" alt="" class="intephoto1">
                    </div>
                    <div class="rhs">
                        <h4><span class="intename1">Jolia</span> Can able to view the below details</h4>
                        <ul>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_about" checked="">
                                    <label for="pro_about">About section</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_photo">
                                    <label for="pro_photo">Photo gallery</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_contact">
                                    <label for="pro_contact">Contact info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_person">
                                    <label for="pro_person">Personal info</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_hobbi">
                                    <label for="pro_hobbi">Hobbies</label>
                                </div>
                            </li>
                            <li>
                                <div class="chbox">
                                    <input type="checkbox" id="pro_social">
                                    <label for="pro_social">Social media</label>
                                </div>
                            </li>
                        </ul>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="text"
                                placeholder="Comment goes here"></textarea>
                            <label for="comment">Write some message to <span class="intename"></span></label>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send interest</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- END INTEREST POPUP -->

    <!--- CHAT CONVERSATION BOX START --->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="images/profiles/2.jpg" class="intephoto2" alt="">
                    <h4><b>Angelina Jolie</b>,</h4>
                    <span class="avlsta avilyes">Available online</span>
                </div>
                <div class="s2 chat-box-messages">
                    <span class="chat-wel">Start a new chat!!! now</span>
                    <div class="chat-con">
                        <div class="chat-lhs">Hi</div>
                        <div class="chat-rhs">Hi</div>
                    </div>
                    <!--<span>Start A New Chat!!! Now</span>-->
                </div>
                <div class="s3">
                    <input type="text" name="chat_message" placeholder="Type a message here.." required="">
                    <button id="chat_send1" name="chat_send" type="submit">Send <i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!--- END --->

    <!-- FOOTER -->
    <?php include('footer.php'); ?>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>