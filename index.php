<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session-2.php'); ?>
<?php
$query_Recordset2 = "SELECT * FROM `cities` ORDER BY city";
$Recordset2 = mysqli_query( $theweddingmatrimony, $query_Recordset2 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset2 = mysqli_fetch_assoc( $Recordset2 );
$totalRows_Recordset2 = mysqli_num_rows( $Recordset2 );

$query_Recordset3 = "SELECT * FROM `religion`";
$Recordset3 = mysqli_query( $theweddingmatrimony, $query_Recordset3 )or die( mysqli_error( $theweddingmatrimony ) );
$row_Recordset3 = mysqli_fetch_assoc( $Recordset3 );
$totalRows_Recordset3 = mysqli_num_rows( $Recordset3 );

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Wedding Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="theme-color" content="#f6af04" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/style.css" />

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
            <span class="lod1"><img src="images/loder/1.png" alt="" loading="lazy" /></span>
            <span class="lod2"><img src="images/loder/2.png" alt="" loading="lazy" /></span>
            <span class="lod3"><img src="images/loder/3.png" alt="" loading="lazy" /></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->

    <?php include('header.php'); ?>

    <!-- BANNER & SEARCH -->
    <section>
        <div class="str">
            <div class="hom-head">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <h1>Find your<br /><b>Right Match</b> here</h1>
                                <p>Most trusted Matrimony Brand in the World.</p>
                            </div>
                            <div class="ban-search chosenini">
                                <form action="profiles.php" method="POST" name="form" class="form">
                                    <ul>
                                        <li class="sr-look">
                                            <div class="form-group">
                                                <label>I'm looking for</label>
                                                <select class="chosen-select" name="gender">
                                                    <option value="">I'm looking for</option>
                                                    <option value="Man">Man</option>
                                                    <option value="Woman">Woman</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-age">
                                            <div class="form-group">
                                                <label>Age Range</label>
                                                <select class="chosen-select" name="age_min">
                                                    <option value="">From Age</option>
                                                    <?php
                                                    for($age = 18; $age <= 70; $age++) {
                                                        echo "<option value=\"$age\">$age</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-age">
                                            <div class="form-group">
                                                <select class="chosen-select" name="age_max">
                                                    <option value="">To Age</option>
                                                    <?php
                                                    for($age = 18; $age <= 70; $age++) {
                                                        echo "<option value=\"$age\">$age</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-reli">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <select class="chosen-select" name="religion">
                                                    <option value="">Religion</option>
                                                    <?php
                                                    do {
                                                        echo '<option value="' . $row_Recordset3['religion'] . '">' . $row_Recordset3['religion'] . '</option>';
                                                    } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
                                                    ?>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-cit">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="chosen-select" name="city">
                                                    <option value="">Location</option>
                                                    <?php
                                                    do {
                                                        echo '<option value="' . $row_Recordset2['city'] . '">' . $row_Recordset2['city'] . '</option>';
                                                    } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
                                                    ?>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint
                                                        Eustatius and Saba</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                    </option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean
                                                        Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cabo Verde">Cabo Verde</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, Democratic Republic of the">Congo, Democratic
                                                        Republic of the</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curaçao">Curaçao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czechia">Czechia</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Eswatini">Eswatini</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Holy See">Holy See</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Ivory Coast">Ivory Coast</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea,
                                                        Democratic People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's
                                                        Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="North Macedonia">North Macedonia</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestine, State of">Palestine, State of</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and
                                                        the Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Sint Maarten">Sint Maarten</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Sudan">South Sudan</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom of Great Britain and Northern
                                                        Ireland">United Kingdom of Great Britain and Northern
                                                        Ireland</option>
                                                    <option value="United States of America">United States of America
                                                    </option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="sr-btn">
                                            <input type="submit" name="submit" value="Search" />
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER SLIDER -->
    <section>
        <div class="hom-ban-sli">
            <div>
                <ul class="ban-sli">
                    <li>
                        <div class="image">
                            <img src="images/banner/wedding-banner-1.jpg" alt="" loading="lazy" />
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="images/banner/wedding-banner-2.jpg" alt="" loading="lazy" />
                        </div>
                    </li>
                    <li>
                        <div class="image">
                            <img src="images/banner/wedding-banner-3.jpg" alt="" loading="lazy" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- QUICK ACCESS -->
    <section>
        <div class="str home-acces-main">
            <div class="container">
                <div class="row">
                    <!-- BACKGROUND SHAPE -->
                    <div class="wedd-shap">
                        <span class="abo-shap-1"></span>
                        <span class="abo-shap-4"></span>
                    </div>
                    <!-- END BACKGROUND SHAPE -->

                    <div class="home-tit">
                        <p>Quick Access</p>
                        <h2><span>Our Services</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="home-acces">
                        <ul class="hom-qui-acc-sli">
                            <li>
                                <div class="wow fadeInUp hacc hacc1" data-wow-delay="0.1s">
                                    <div class="con">
                                        <img src="images/icon/user.png" alt="" loading="lazy" />
                                        <h4>Browse Profiles</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="profiles.php">View more</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc2" data-wow-delay="0.2s">
                                    <div class="con">
                                        <img src="images/icon/gate.png" alt="" loading="lazy" />
                                        <h4>Wedding</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="">View more</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc3" data-wow-delay="0.3s">
                                    <div class="con">
                                        <img src="images/icon/couple.png" alt="" loading="lazy" />
                                        <h4>All Services</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="">View more</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc4" data-wow-delay="0.4s">
                                    <div class="con">
                                        <img src="images/icon/hall.png" alt="" loading="lazy" />
                                        <h4>Join Now</h4>
                                        <p>Start for free</p>
                                        <a href="plans.php">Get started</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc3" data-wow-delay="0.3s">
                                    <div class="con">
                                        <img src="images/icon/photo-camera.png" alt="" loading="lazy" />
                                        <h4>Photo gallery</h4>
                                        <p>1200+ Profiles</p>
                                        <a href="#photo-gallery">View more</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="wow fadeInUp hacc hacc4" data-wow-delay="0.4s">
                                    <div class="con">
                                        <img src="images/icon/cake.png" alt="" loading="lazy" />
                                        <h4>Blog & Articles</h4>
                                        <p>Start for free</p>
                                        <a href="">Get started</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- TRUST BRANDS -->
    <section>
        <div class="hom-cus-revi">
            <div class="container">
                <div class="row">

                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2>
                            <span>Trust by <b class="num">1500</b>+ Couples</span>
                        </h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <p class="text-center mb-3">India | USA | Canada | UK | Singapore | Australia | UAE | NRI
                        Matrimonials</p>
                    <div class="slid-inn cus-revi">
                        <ul class="slider3">
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <img src="images/couples/couple9.jpg" alt="" loading="lazy" />
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>
                                        Finding the perfect partner is a journey filled with hopes and dreams. At The
                                        Wedding Matrimony, we understand the significance of this journey and are
                                        here to help you every step of the way. Our platform has been bringing people
                                        together since its inception, making countless successful matches.
                                    </p>
                                    <!-- <h5>Jack danial</h5>
                                    <span>New york</span> -->
                                </div>
                            </li>
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <img src="images/couples/couple2.jpg" alt="" loading="lazy" />
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>
                                        Finding your perfect partner is a cherished journey. At The Wedding Matrimony,
                                        we understand its importance. Our platform is dedicated to connecting hearts and
                                        creating beautiful love stories, helping you find your soulmate and embark on a
                                        lifelong journey of love and companionship.
                                    </p>
                                    <!-- <h5>Jack danial</h5>
                                    <span>New york</span> -->
                                </div>
                            </li>
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <img src="images/couples/couple3.jpg" alt="" loading="lazy" />
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>
                                        Love is a timeless journey transcending eras. At The Wedding Matrimony, we
                                        believe in bringing two hearts together. Since our inception, we have been
                                        committed to helping individuals find their perfect match and create lasting
                                        love stories, making dreams come true.
                                    </p>
                                    <!-- <h5>Jack danial</h5>
                                    <span>New york</span> -->
                                </div>
                            </li>
                            <li>
                                <div class="cus-revi-box">
                                    <div class="revi-im">
                                        <img src="images/couples/couple6.jpg" alt="" loading="lazy" />
                                        <i class="cir-com cir-1"></i>
                                        <i class="cir-com cir-2"></i>
                                        <i class="cir-com cir-3"></i>
                                    </div>
                                    <p>
                                        Love is a beautiful journey, and finding the right partner makes it even more
                                        special. At The Wedding Matrimony, we are dedicated to helping you find your
                                        perfect match. Our guiding principle has always been to create meaningful
                                        connections since our inception. Join us and start your journey.
                                    </p>
                                    <!-- <h5>Jack danial</h5>
                                    <span>New york</span> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="cta-full-wid">
                        <a href="#!" class="cta-dark">More customer reviews</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- BANNER -->
    <section>
        <div class="str">
            <div class="ban-inn ban-home">
                <div class="container">
                    <div class="row">
                        <div class="hom-ban">
                            <div class="ban-tit">
                                <span><i class="no1">#1</i> The Wedding Matrimony</span>
                                <h2>Why choose us</h2>
                                <p>
                                    Most Trusted and premium Matrimony Service in the World.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ab-sec2">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.1">
                                <img src="images/icon/prize.png" alt="" loading="lazy" />
                                <h4>Genuine profiles</h4>
                                <p>Contact genuine profiles with 100% verified mobile</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.3">
                                <img src="images/icon/trust.png" alt="" loading="lazy" />
                                <h4>Most trusted</h4>
                                <p>The most trusted wedding matrimony brand</p>
                            </div>
                        </li>
                        <li>
                            <div class="animate animate__animated animate__slower" data-ani="animate__flipInX"
                                data-dely="0.6">
                                <img src="images/icon/rings.png" alt="" loading="lazy" />
                                <h4>2000+ weddings</h4>
                                <p>Lakhs of peoples have found their life partner</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- ABOUT START -->
    <section>
        <div class="ab-wel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ab-wel-lhs">
                            <span class="ab-wel-3"></span>
                            <img src="images/gallery/image-wedding-1.jpg" alt="" loading="lazy" class="ab-wel-1" />
                            <img src="images/gallery/image-wedding-6.jpg" alt="" loading="lazy" class="ab-wel-2" />
                            <span class="ab-wel-4"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ab-wel-rhs">
                            <div class="ab-wel-tit">
                                <h2>Welcome to <em>Wedding matrimony</em></h2>
                                <p>
                                    Finding your perfect match is a journey, and we're here to make it as seamless and
                                    joyful as possible. Our platform is designed to bring together individuals seeking
                                    meaningful and lasting relationships.
                                </p>
                                <p>
                                    <a href="plans.php">Click here to</a> Start you The Wedding Matrimony
                                    service now.
                                </p>
                            </div>
                            <div class="ab-wel-tit-1">
                                <p>
                                    While there are many matchmaking services available, not all offer the authenticity
                                    and reliability you need. Many have been compromised with irrelevant details or
                                    random profiles that don’t seem genuine.
                                </p>
                            </div>
                            <div class="ab-wel-tit-2">
                                <ul>
                                    <li>
                                        <div>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <h4>Enquiry <em>+91 6200404577</em></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <h4>Get Support <em>theweddingmatrimony@gmail.com</em></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- COUNTS START -->
    <section>
        <div class="ab-cont">
            <div class="container">
                <div class="row">
                    <ul>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                <div>
                                    <h4>2K</h4>
                                    <span>Couples pared</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div>
                                    <h4>4000+</h4>
                                    <span>Registerents</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-male" aria-hidden="true"></i>
                                <div>
                                    <h4>1600+</h4>
                                    <span>Mens</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="ab-cont-po">
                                <i class="fa fa-female" aria-hidden="true"></i>
                                <div>
                                    <h4>2000+</h4>
                                    <span>Womens</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- MOMENTS START -->
    <section>
        <div class="wedd-tline">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Moments</p>
                        <h2><span>How it works</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="inn">
                        <ul>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/rings.png" alt="" loading="lazy" />
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Register</h5>
                                        <!-- <span>Timing: 7:00 PM</span> -->
                                        <p>
                                            Join us for an evening of discovery and connection. Register now to explore
                                            opportunities and meet like-minded individuals.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Find your Match</h5>
                                        <!-- <span>Timing: 7:00 PM</span> -->
                                        <p>
                                            Join us at The Wedding Matrimony to discover your perfect match.
                                        </p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/wedding-2.png" alt="" loading="lazy" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/love-birds.png" alt="" loading="lazy" />
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Send Interest</h5>
                                        <!-- <span>Timing: 7:00 PM</span> -->
                                        <p>
                                            Show your interest in someone special at The Wedding Matrimony.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Get Profile Information</h5>
                                        <p>
                                            Explore member profiles.
                                        </p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/network.png" alt="" loading="lazy" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn">
                                    <div class="tline-im animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/chat.png" alt="" loading="lazy" />
                                    </div>
                                    <div class="tline-con animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <h5>Start Meetups</h5>
                                        <p>
                                            Initiate meetups and connect.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tline-inn tline-inn-reve">
                                    <div class="tline-con animate animate__animated animate__slower"
                                        data-ani="animate__fadeInUp">
                                        <h5>Getting Marriage</h5>
                                        <p>
                                            Embark on the journey of marriage.
                                        </p>
                                    </div>
                                    <div class="tline-im animate animate__animated animate__slow"
                                        data-ani="animate__fadeInUp">
                                        <img src="images/icon/wedding-couple.png" alt="" loading="lazy" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- RECENT COUPLES -->
    <section>
        <div class="hom-couples-all">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>trusted brand</p>
                        <h2><span>Recent Couples</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                </div>
            </div>
            <div class="hom-coup-test">
                <ul class="couple-sli">
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Rahul & Priya <span>Delhi, India</span></h4>
                                <!-- <a href="video.php" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple1.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Amit & Sunita <span>Mumbai, India</span></h4>
                                <!-- <a href="video.php" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple2.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Vikram & Asha <span>Bangalore, India</span></h4>
                                <!-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple3.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Ravi & Meera <span>Chennai, India</span></h4>
                                <!-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple4.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Rohan & Anjali <span>Kolkata, India</span></h4>
                                <!-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple5.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Arjun & Sita <span>Hyderabad, India</span></h4>
                                <!-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple6.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Sachin & Pooja <span>Pune, India</span></h4>
                                <!-- <a href="wedding-video.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="hom-coup-box">
                            <span class="leaf"></span>
                            <img src="images/couples/couple9.jpg" alt="" loading="lazy" />
                            <div class="bx">
                                <h4>Karan & Neha <span>Ahmedabad, India</span></h4>
                                <!-- <a href="wedding.html" class="sml-cta cta-dark">View more</a> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- GALLERY START -->
    <section>
        <div class="wedd-gall home-wedd-gall" id="photo-gallery">
            <div class="">
                <div class="gall-inn">
                    <div class="home-tit">
                        <p>collections</p>
                        <h2><span>Photo gallery</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="gal-im animate animate__animated animate__slow" data-ani="animate__flipInX">
                            <img src="images/gallery/photo.jpg" class="gal-siz-1" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo2.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo3.png" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo4.jpg" class="gal-siz-1" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo5.jpg" class="gal-siz-1" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo6.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/image-wedding-3.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/image-wedding-4.jpg" class="gal-siz-1" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo9.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo10.jpg" class="gal-siz-1" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/image-wedding-5.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/image-wedding-2.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo11.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/gallery/photo12.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                            <img src="images/couples/couple8.jpg" class="gal-siz-2" alt="" loading="lazy" />
                            <div class="txt">
                                <span>Wedding</span>
                                <h4>Bride & Groom</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- Video Start -->
    <section>
        <div class="">
            <div class="container">
                <div class="home-tit">
                    <p>collections</p>
                    <h2><span>Video gallery</span></h2>
                    <span class="leaf1"></span>
                    <span class="tit-ani-"></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <video class="video-responsive" controls>
                                <source src="images/video/video1.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <video class="video-responsive" controls>
                                <source src="images/video/video2.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="">
                            <video class="video-responsive" controls>
                                <source src="images/video/video3.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <video class="video-responsive" controls>
                                <source src="images/video/video4.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video End -->

    <!-- FIND YOUR MATCH BANNER -->
    <section>
        <div class="str count">
            <div class="container">
                <div class="row">
                    <div class="fot-ban-inn">
                        <div class="lhs">
                            <h2>Find your perfect Match now</h2>
                            <p>
                                Welcome to our matrimony platform, where love stories begin. Our dedicated services and
                                extensive profiles make it easier for you to find your ideal partner. Join us today and
                                start your journey towards a blissful future.
                            </p>
                            <a href="sign-up.php" class="cta-3">Register Now</a>
                            <a href="" class="cta-4">Help & Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <?php include('footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/custom.js"></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Service",
        "name": "The Wedding Matrimony",
        "image": "https://theweddings.co.in/images/logo1.png",

        "brand": {
            "@type": "Brand",
            "name": "The Wedding Matrimony"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "578"
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $('.chosen-select').chosen();

        $('.chosen-select').on('chosen:showing_dropdown', function(evt, params) {
            var $chosenDrop = $(this).next('.chosen-container').find('.chosen-drop');
            var dropOffset = $chosenDrop.offset();
            var dropWidth = $chosenDrop.width();
            var viewportWidth = $(window).width();

            if (dropOffset.left + dropWidth > viewportWidth) {
                $chosenDrop.css('left', viewportWidth - dropOffset.left - dropWidth + 'px');
            }
        });
    });
    </script>
</body>

</html>