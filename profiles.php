<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session-2.php'); ?>
<?php $profileviews = isset($_SESSION['email']); ?>
<?php

if ( isset( $_POST[ 'age_min' ] ) && isset( $_POST['age_max'] ) && isset( $_POST[ 'religion' ] ) && isset( $_POST[ 'city' ] ) && isset( $_POST[ 'gender' ] ) ) {
  $age_min = $_POST[ 'age_min' ];
  $age_max = $_POST[ 'age_max' ];
  $religion = $_POST[ 'religion' ];
  $city = $_POST[ 'city' ];
  $gender = $_POST[ 'gender' ];
  $caste = isset($_POST['caste']) ? $_POST['caste'] : '';

  $query_Recordset2 = "SELECT * FROM `user` WHERE age BETWEEN '$age_min' AND '$age_max' AND religion = '$religion' AND city = '$city' AND gender = '$gender'";
   // Add caste condition only if a caste is selected
  if (!empty($caste)) {
    $query_Recordset2 .= " AND caste = '$caste'";
  }
  $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
  $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
  echo $query_Recordset2;
} else {
  $query_Recordset2 = "SELECT * FROM `user`";
  $Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
  $row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
  $totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );
}

$editFormAction = $_SERVER[ 'PHP_SELF' ];
if ( isset( $_SERVER[ 'QUERY_STRING' ] ) ) {
  $editFormAction .= "?" . htmlentities( $_SERVER[ 'QUERY_STRING' ] );
}

$query_Recordset3 = "SELECT * FROM `cities` ORDER BY city";
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

    <!-- SUB-HEADING -->
    <section>
        <div class="all-pro-head">
            <div class="container">
                <div class="row">
                    <h1>Lakhs of Happy Marriages</h1>
                    <?php if (!isset($_SESSION['email'])) { ?>
                    <a href="sign-up.php">Join now for Free <i class="fa fa-handshake-o" aria-hidden="true"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--FILTER ON MOBILE VIEW-->
        <div class="fil-mob fil-mob-act">
            <h4>Profile filters <i class="fa fa-filter" aria-hidden="true"></i> </h4>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="all-weddpro all-jobs all-serexp chosenini">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <span class="filter-clo">+</span>
                        <!-- START -->
                        <form action="<?php echo $editFormAction;?>" method="POST" name="form" class="form">
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-search" aria-hidden="true"></i> I'm looking for</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="gender">
                                        <option value="">I'm looking for</option>
                                        <option value="Man"
                                            <?php if(isset($_POST['gender']) && $_POST['gender'] == "Man") echo " selected"; ?>>
                                            Man</option>
                                        <option value="Woman"
                                            <?php if(isset($_POST['gender']) && $_POST['gender'] == "Woman") echo " selected"; ?>>
                                            Woman</option>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-clock-o" aria-hidden="true"></i>From Age</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="age_min">
                                        <option value="">From Age</option>
                                        <?php for ($minage=18; $minage <= 40; $minage++) { ?>
                                        <option value="<?php echo $minage; ?>"
                                            <?php if(isset($_POST['age_min']) && $_POST['age_min'] == $minage) echo "selected" ?>>
                                            <?php echo $minage; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->

                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-clock-o" aria-hidden="true"></i>To Age</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="age_max">
                                        <option value="">To Age</option>
                                        <?php for ($maxage=18; $maxage <= 40; $maxage++) { ?>
                                        <option value="<?php echo $maxage; ?>"
                                            <?php if(isset($_POST['age_max']) && $_POST['age_max'] == $maxage) echo "selected" ?>>
                                            <?php echo $maxage; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->
                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-bell-o" aria-hidden="true"></i>Select Religion</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="religion" id="religion">
                                        <option value="">Religion</option>
                                        <option value="Hindu"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Hindu") echo " selected"; ?>>
                                            Hindu</option>
                                        <option value="Muslim"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Muslim") echo " selected"; ?>>
                                            Muslim</option>
                                        <option value="Jainism"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Jainism") echo " selected"; ?>>
                                            Jainism</option>
                                        <option value="Christianity"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Christianity") echo " selected"; ?>>
                                            Christianity</option>
                                        <option value="Sikhism"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Sikhism") echo " selected"; ?>>
                                            Sikhism</option>
                                        <option value="Buddhism"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Buddhism") echo " selected"; ?>>
                                            Buddhism</option>
                                        <option value="Zoroastrianism"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Zoroastrianism") echo " selected"; ?>>
                                            Zoroastrianism</option>
                                        <option value="Tribal Religions"
                                            <?php if(isset($_POST['religion']) && $_POST['religion'] == "Tribal Religions") echo " selected"; ?>>
                                            Tribal Religions</option>
                                    </select>
                                </div>
                            </div>
                            <!-- END -->

                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Caste</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="caste" id="caste">
                                        <option value="">Select Caste</option>
                                    </select>
                                </div>
                            </div>

                            <!-- START -->
                            <div class="filt-com lhs-cate">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h4>
                                <div class="form-group">
                                    <select class="chosen-select" name="city">
                                        <option value="">Location</option>
                                        <?php
                                        do {
                                            $selected = (isset($_POST['city']) && $_POST['city'] == $row_Recordset3['city']) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($row_Recordset3['city']) . '" ' . $selected . '>' . htmlspecialchars($row_Recordset3['city']) . '</option>';
                                        } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <!-- END -->
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn-1" value="Search">Search</button>
                            </div>
                        </form>
                        <!-- END -->
                    </div>
                    <div class="col-md-9">
                        <div class="short-all">
                            <div class="short-lhs">
                                Showing <b><?php echo $totalRows_Recordset2; ?></b> profiles
                            </div>
                            <div class="short-rhs">
                                <ul>
                                    <li>
                                        Sort by:
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <select class="chosen-select">
                                                <option value="">Most relative</option>
                                                <option value="newest">Date listed: Newest</option>
                                                <option value="oldest">Date listed: Oldest</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-1">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sort-grid sort-grid-2 act">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="all-list-sh">
                            <ul>
                                <?php
                                            if ( $totalRows_Recordset2 > 0 ) {
                                            do {
                                                ?>
                                <li>

                                    <div class="all-pro-box user-avil-onli" data-useravil="avilyes"
                                        data-aviltxt="Available online">
                                        <!--PROFILE IMAGE-->
                                        <div class="pro-img"
                                            style=" background-position: center; background-size:cover;">
                                            <?php if ($profileviews) { ?>
                                            <a
                                                href="profile-details.php?user_id=<?php echo $row_Recordset2['user_id']; ?>">
                                                <img src="images/profiles/<?php echo $row_Recordset2['photo']; ?>"
                                                    alt="">
                                            </a>
                                            <?php } else { ?>
                                            <a href="plans.php">
                                                <img src="images/profiles/<?php echo $row_Recordset2['photo']; ?>"
                                                    alt="">
                                            </a>
                                            <?php } ?>
                                            <div class="pro-ave" title="User currently available">
                                                <span class="pro-ave-yes"></span>
                                            </div>
                                            <div class="pro-avl-status">
                                                <h5>Available Online</h5>
                                            </div>
                                        </div>
                                        <!--END PROFILE IMAGE-->

                                        <!--PROFILE NAME-->
                                        <div class="pro-detail">
                                            <?php if ($profileviews) { ?>
                                            <h4><a
                                                    href="profile-details.php?user_id=<?php echo $row_Recordset2['user_id']; ?>"><?php echo $row_Recordset2['mname']; ?></a>
                                            </h4>
                                            <?php } else { ?>
                                            <h4><a href="plans.php"><?php echo $row_Recordset2['mname']; ?></a>
                                            </h4>
                                            <?php } ?>
                                            <div class="pro-bio">
                                                <span><?php echo $row_Recordset2['education']; ?></span>
                                                <span><?php echo $row_Recordset2['occupation']; ?></span>
                                                <span><?php echo $row_Recordset2['age']; ?> Year Old</span>
                                                <span>Height: <?php echo $row_Recordset2['height']; ?>s</span>
                                            </div>
                                            <div class="links">
                                                <span class="cta-chat">Chat now</span>
                                                <a href="#!">WhatsApp</a>
                                                <a href="#!" class="cta cta-sendint" data-bs-toggle="modal"
                                                    data-bs-target="#sendInter">Send interest</a>
                                                <?php if ($profileviews) { ?>
                                                <a
                                                    href="profile-details.php?user_id=<?php echo $row_Recordset2['user_id']; ?>">More
                                                    detaiils</a>
                                                <?php } else { ?>
                                                <a href="plans.php">More detaiils</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!--END PROFILE NAME-->
                                        <!--SAVE-->
                                        <span class="enq-sav" data-toggle="tooltip"
                                            title="Click to save this provile."><i class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></i></span>
                                        <!--END SAVE-->
                                    </div>
                                </li>
                                <?php }while($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->


    <!-- INTEREST POPUP -->
    <div class="modal fade" id="sendInter">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title seninter-tit">Send interest to <span class="intename2">Jolia</span></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body seninter">
                    <div class="lhs">
                        <img src="images/profiles/1.jpg" alt="" class="intephoto2">
                    </div>
                    <div class="rhs">
                        <h4>Permissions: <span class="intename2">Jolia</span> Can able to view the below details</h4>
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

    <!-- CHAT CONVERSATION BOX START -->
    <div class="chatbox">
        <span class="comm-msg-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>

        <div class="inn">
            <form name="new_chat_form" method="post">
                <div class="s1">
                    <img src="images/user/2.jpg" class="intephoto2" alt="">
                    <h4><b class="intename2">Julia</b>,</h4>
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
    <script>
    $(document).ready(function() {
        const castesMap = {
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

        const commonCastes = ['SC', 'ST', 'OBC', 'Other', 'Prefer not to say'];

        // Get the selected caste from PHP
        const selectedCaste = "<?php echo isset($_POST['caste']) ? $_POST['caste'] : ''; ?>";

        // Function to update caste options
        function updateCasteOptions(selectedReligion) {
            const $casteSelect = $('#caste');

            // Destroy existing chosen
            $casteSelect.chosen('destroy');

            // Clear current options
            $casteSelect.empty();
            $casteSelect.append('<option value="">Select Caste</option>');

            // Add religion-specific castes
            if (selectedReligion && castesMap[selectedReligion]) {
                castesMap[selectedReligion].forEach(caste => {
                    const selected = (caste === selectedCaste) ? 'selected' : '';
                    $casteSelect.append(`<option value="${caste}" ${selected}>${caste}</option>`);
                });
            }

            // Add common castes
            commonCastes.forEach(caste => {
                const selected = (caste === selectedCaste) ? 'selected' : '';
                $casteSelect.append(`<option value="${caste}" ${selected}>${caste}</option>`);
            });

            // Reinitialize chosen
            $casteSelect.chosen({
                allow_single_deselect: true,
                width: '100%'
            });
        }

        // Handle religion change
        $('#religion').on('change', function() {
            const selectedReligion = $(this).val();
            updateCasteOptions(selectedReligion);
        });

        // Initial load if religion is pre-selected
        const initialReligion = $('#religion').val();
        if (initialReligion) {
            updateCasteOptions(initialReligion);
        }

        // If there's a selected caste but no religion, show all castes
        if (selectedCaste && !initialReligion) {
            // Show all possible castes
            let allCastes = new Set();
            Object.values(castesMap).forEach(castes => {
                castes.forEach(caste => allCastes.add(caste));
            });
            commonCastes.forEach(caste => allCastes.add(caste));

            const $casteSelect = $('#caste');
            $casteSelect.chosen('destroy');
            $casteSelect.empty();
            $casteSelect.append('<option value="">Select Caste</option>');

            Array.from(allCastes).sort().forEach(caste => {
                const selected = (caste === selectedCaste) ? 'selected' : '';
                $casteSelect.append(`<option value="${caste}" ${selected}>${caste}</option>`);
            });

            $casteSelect.chosen({
                allow_single_deselect: true,
                width: '100%'
            });
        }
    });
    </script>
</body>

</html>