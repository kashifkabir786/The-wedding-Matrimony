<!-- SEARCH -->
<div class="pop-search">
    <span class="ser-clo">+</span>
    <div class="inn">
        <form>
            <input type="text" placeholder="Search here...">
        </form>
        <div class="rel-sear">
            <h4>Top searches:</h4>
            <a href="profiles.php">Browse all profiles</a>
            <a href="#">Mens profile</a>
            <a href="#">Female profile</a>
            <a href="#">New profiles</a>
        </div>
    </div>
</div>
<!-- END PRELOADER -->

<!-- HEADER & MENU -->
<div class="head-top">
    <div class="container">
        <div class="row">
            <div class="lhs">
                <ul>
                    <li><a href="#!" class="ser-open"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="plans.php">Plans</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="rhs">
                <ul>
                    <li><a href="tel:+6200404577"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+91 6200404577</a>
                    </li>
                    <li><a href="" class="text-transform"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;
                            theweddingmatrimony@gmail.com</a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=61560570983143&mibextid=kFxxJD"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/the_wedding_metrimony?utm_source=qr&igsh=aWE2Znp6dDF1ZmRu"><i
                                class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER & MENU -->

<!-- HEADER & MENU -->
<div class="menu-pop menu-pop1">
    <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
    <div class="inn">
        <img src="images/logo1.png" alt="" height="55px" alt="" loading="lazy" class="logo-brand-only">
        <p><strong>The Wedding Matrimony</strong> Finding your perfect match is a significant journey, and we are here
            to make it memorable. At The Wedding Matrimony, we understand the importance of this life-changing
            decision.</p>
        <ul class="menu-pop-info">
            <li><a href="tel:+6200404577"><i class="fa fa-phone" aria-hidden="true"></i>+91 6200404577</a></li>
            <!-- <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li> -->
            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>theweddingmatrimony@gmail.com</a></li>
            <!-- <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>3812 Lena Lane City Jackson
                    Mississippi</a></li> -->
        </ul>
        <div class="menu-pop-soci">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=61560570983143&mibextid=kFxxJD"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQG7yBi1weCV6QAAAZEmunqo-NPGpAYpeFmvyZO04Dr4WbXr8anD9KCozAj8nHiQjqSR7B3WoxdjZDdjlRb6r08yI1w017lSIQZ64UljRBq1TD2PV7AIha_FW5eZtgQ5zmQwWcs=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fthewedding-matrimony-327187312%3Futm_source%3Dshare%26utm_campaign%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dandroid_app"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="https://x.com/Thewedding70001?t=zlb0QA4ZajRroCR8L43TgQ&s=08"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/the_wedding_metrimony?utm_source=qr&igsh=aWE2Znp6dDF1ZmRu"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- END HEADER & MENU -->

<!-- HEADER & MENU -->
<div class="menu-pop menu-pop2">
    <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
    <div class="inn">
        <div class="menu-pop-help">
            <div class="user-pro">
                <?php if ($row_Recordset1['photo']) { ?>
                <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt="" loading="lazy">
                <?php } else { ?>
                <img src="images/profiles/dummy-profile.png" alt="Dummy Image" loading="lazy">
                <?php } ?>
            </div>
            <div class="user-bio">
                <h5><?php echo $row_Recordset1['mname']; ?></h5>
                <h4>The Wedding Matrimony ID: <?php echo "TWM" . str_pad($row_Recordset1['user_id'], 5, '0', STR_PAD_LEFT); ?></h4>
                <a href="user-dashboard.php" class="btn btn-primary btn-sm">View Profile</a>
            </div>
        </div>
        <div class="late-news" style="display:none;">
            <h4>Latest news</h4>
            <ul>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/1.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/3.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/4.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END HEADER & MENU -->

<!-- HEADER & MENU -->
<div class="hom-top">
    <div class="container">
        <div class="row">
            <div class="hom-nav">
                <!-- LOGO -->
                <div class="logo">
                    <span class="menu desk-menu">
                        <i></i><i></i><i></i>
                    </span>
                    <a href="index.php" class="logo-brand"><img src="images/logo1.png" alt="" height="55px"
                            loading="lazy" class="ic-logo"></a>
                </div>

                <!-- TOP MENU -->
                <div class="bl">
                    <?php if ( !isset( $_SESSION[ 'email' ] ) ) { ?>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="sign-up.php">Register</a></li>
                    </ul>
                    <?php } else { ?>
                    <ul>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <?php } ?>
                </div>

                <!-- USER PROFILE -->
                <div class="al">
                    <div class="head-pro">
                        <?php if (isset($row_Recordset1) && !empty($row_Recordset1)) { ?>
                        <?php if ($row_Recordset1['photo']) { ?>
                        <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt="" loading="lazy">
                        <?php } else { ?>
                        <img src="images/profiles/dummy-profile.png" alt="Dummy Image" loading="lazy">
                        <?php } ?>
                        <h4><?php echo $row_Recordset1['mname']; ?></h4>
                        <p><small>ID: <?php echo "TWM" . str_pad($row_Recordset1['user_id'], 5, '0', STR_PAD_LEFT); ?></small></p>
                        <?php } ?>
                    </div>

                </div>
                <!--MOBILE MENU-->
                <div class="mob-menu">
                    <div class="mob-me-ic">
                        <span class="ser-open mobile-ser">
                            <img src="images/icon/search.svg" alt="">
                        </span>
                        <span class="mobile-exprt" data-mob="dashbord">
                            <img src="images/icon/users.svg" alt="">
                        </span>
                        <span class="mobile-menu" data-mob="mobile">
                            <img src="images/icon/menu.svg" alt="">
                        </span>
                    </div>
                </div>
                <!--END MOBILE MENU-->
            </div>
        </div>
    </div>
</div>
<!-- END HEADER & MENU -->

<!-- MOBILE MENU POPUP -->
<div class="mob-me-all mobile_menu">
    <div class="mob-me-clo"><img src="images/icon/close.png" alt=""></div>
    <div class="mv-bus">
        <h4><i class="fa fa-align-center" aria-hidden="true"></i> All Pages</h4>
        <ul>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="plans.php">Plans</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
        <div class="menu-pop-help">
            <div class="user-pro">
                <?php if ($row_Recordset1['photo']) { ?>
                <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt="" loading="lazy">
                <?php } else { ?>
                <img src="images/profiles/dummy-profile.png" alt="Dummy Image" loading="lazy">
                <?php } ?>
            </div>
            <div class="user-bio">
                <?php if (isset($row_Recordset1) && !empty($row_Recordset1)) { ?>
                <h5><?php echo $row_Recordset1['mname']; ?></h5>
                <a href="user-dashboard.php" class="btn btn-primary btn-sm">View Profile</a>
                <?php } ?>
            </div>
        </div>
        <div class="late-news" style="display:none;">
            <h4>Latest news</h4>
            <ul>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/1.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/3.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
                <li>
                    <div class="rel-pro-img">
                        <img src="images/couples/4.jpg" alt="" loading="lazy">
                    </div>
                    <div class="rel-pro-con">
                        <h5>Long established fact that a reader distracted</h5>
                        <span class="ic-date">12 Dec 2023</span>
                    </div>
                    <a href="blog-detail.html" class="fclick"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END MOBILE MENU POPUP -->

<!-- MOBILE USER PROFILE MENU POPUP -->
<div class="mob-me-all dashbord_menu">
    <div class="mob-me-clo"><img src="images/icon/close.png" alt=""></div>
    <div class="mv-bus">
        <?php if (isset($row_Recordset1) && !empty($row_Recordset1)) { ?>
        <div class="head-pro">
            <?php if ($row_Recordset1['photo']) { ?>
            <img src="images/profiles/<?php echo $row_Recordset1['photo']; ?>" alt="" loading="lazy">
            <?php } else { ?>
            <img src="images/profiles/dummy-profile.png" alt="Dummy Image" loading="lazy">
            <?php } ?>
            <b>user profile</b><br>
            <h4><?php echo $row_Recordset1['mname']; ?></h4>
        </div>
        <?php } ?>
        <ul>
            <?php if ( !isset( $_SESSION[ 'email' ] ) ) { ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="sign-up.php">Sign-up</a></li>
            <?php } else { ?>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- END USER PROFILE MENU POPUP -->