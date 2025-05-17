<?php require_once('Connections/theweddingmatrimony.php'); ?>
<?php require_once('session-2.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Wedding Matrimony</title>
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
        <div class="login pg-faq">
            <div class="container">
                <div class="row">
                    <div class="inn ab-faq-lhs">
                        <div class="form-tit">
                            <h4>FAQ</h4>
                            <h1>Frequently asked questions</h1>
                        </div>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapse1">
                                        How Matrimony website works?
                                    </a>
                                </div>
                                <div id="collapse1" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Our matrimony website helps you find your perfect match by allowing you to
                                            create a detailed profile, browse through potential matches, and communicate
                                            with them to build a meaningful connection.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse2">
                                        How to find your perfect match?
                                    </a>
                                </div>
                                <div id="collapse2" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Our matrimony website offers a simple and effective way to find your perfect
                                            match. Create a profile, browse through potential matches based on your
                                            preferences, and start connecting with like-minded individuals to find your
                                            ideal partner.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse3">
                                        Why use our matrimony service?
                                    </a>
                                </div>
                                <div id="collapse3" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Our matrimony service is designed to make finding your life partner easier
                                            and more efficient. With advanced matching algorithms, verified profiles,
                                            and a user-friendly interface, we help you connect with genuine individuals
                                            who share your values and interests.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
                                        What types of profiles are available?
                                    </a>
                                </div>
                                <div id="collapse4" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Our matrimony website features a diverse range of profiles. You can find
                                            individuals from various backgrounds, professions, and interests, making it
                                            easier to find someone who aligns with your preferences and values.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
                                        How do I start?
                                    </a>
                                </div>
                                <div id="collapse5" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Getting started is easy! Simply sign up, create a detailed profile, and start
                                            browsing through potential matches. Our intuitive interface and advanced
                                            search options will help you find and connect with your ideal partner.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
                                        Success Stories?
                                    </a>
                                </div>
                                <div id="collapse6" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Read about our success stories! Many couples have found their life partners
                                            through our website. Their experiences showcase the effectiveness of our
                                            platform in bringing people together and creating lasting relationships.</p>
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

    <?php include('footer.php'); ?>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/select-opt.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>