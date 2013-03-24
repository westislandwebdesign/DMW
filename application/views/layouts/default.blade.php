<!DOCTYPE HTML>
<html lang="en">
<head>

<!--    The following needs to be passed in:
            $title - Page Title
            $navbar_itemName - page's navbar item to be selected in top navbar.
                               This is one of the li #id targets in the navbar below.
-->

    <title>{{ 'Dalton Musicworks - ' . $title  }} </title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <base href="http://dmw.dev/"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="css/bootstrap/2.3.0/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap/2.3.0/bootstrap-responsive.min.css" rel="stylesheet">

    @yield('pre-app-headerlinks')

    <!-- Project -->
    <link href="css/app.css" rel="stylesheet">

    @yield('post-app-header-links')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    @yield('header-js')

</head>
<body>
<!-- ----------- Wrap all page content ------------- -->
<div id="wrap">
    <!-- navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="navbar_logo" class="pull-left" href="">
                    <img src="img/DMWLogo40pxHigh.jpg" alt="Dalton Musicworks"/>
                    <!--                Dalton Musicworks-->
                </a>
                <div class="nav-collapse collapse">
                    <ul id="top_navbar" class="nav pull-right">
                        <li id="top_navbar_guitars"><a href="guitars">Guitars</a></li>
                        <li id="top_navbar_basses"><a href="basses">Basses</a></li>
                        <li id="top_navbar_parts"><a href="parts">Parts</a></li>
<!--                        <li id="top_navbar_parts" class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Parts <b class="caret"></b></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Bridges</a></li>-->
<!--                                <li><a href="#">Bodies</a></li>-->
<!--                                <li><a href="#">Hardware</a></li>-->
<!--                                <li><a href="#">Machine Heads</a></li>-->
<!--                                <li><a href="#">Necks</a></li>-->
<!--                                <li><a href="#">Pickguards</a></li>-->
<!--                                <li><a href="#">Pickups</a></li>-->
<!--                            </ul>-->
                        </li>
                        <li id="top_navbar_amps"><a href="amps">Amps</a></li>
                        <li id="top_navbar_effects"><a href="effects">Effects</a></li>
                        <li id="top_navbar_videos"><a href="videos">Videos</a></li>

                        <li id="top_navbar_faq"><a href="faq">FAQ</a></li>
                        <li id="top_navbar_howtobuy"><a href="how-to-buy">How to Buy</a></li>
                        <li id="top_navbar_about" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="about-philosophy">Philosophy</a></li>
                                <li><a href="about-people">People</a></li>
                                <!--                            <li><a href="#">FAQ</a></li>-->
                                <!--                            <li><a href="#">How to Buy</a></li>-->
                            </ul>
                        </li>
                        <li id="top_navbar_contact"><a href="contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin page content -->
    <div id="main">
        <div class="container">

        @yield('content')

        </div>
    </div>

    <!-- End page content -->
    <!-- need this for sticky footer solution -->
    <div id="push"></div>
</div>
<!-- ------------------ /. wrap --------------------- -->

<!-- Footer -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="footer_row1" class="row">
                    <div class="span5">
                        <a id="footer_logo" class="brand" href="home">
                            <img src="img/DMWLogo40pxHigh.jpg" alt="Dalton Musicworks"/>
<!--                                                        Dalton Musicworks-->
                        </a>
                    </div>

                    <div class="span7">
                        <ul id="footer_links" class="inline pull-right">
                            <!--                            <li><a href="index.php">Home</a></li>-->
                            <li><a href="guitars">Guitars</a></li>
                            <li><a href="basses">Basses</a></li>
                            <li><a href="parts">Parts</a></li>
                            <li><a href="amps">Amps</a></li>
                            <li><a href="effects">Effects</a></li>
                            <li><a href="videos">Videos</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">How to Buy</a></li>
                            <li><a href="about-people">About</a></li>
                            <li><a href="contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="span5 offset5">
                        <p class="muted">&copy; 2013 West Island Web Design</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- --------- Javascript ---------- -->
<!-- jQuery (required for Bootstrap) -->
<script src="js/jquery-1.9.1.min.js"></script>

<!-- Bootstrap -->
<script src="js/bootstrap/2.3.0/bootstrap.min.js"></script>

<!-- enable basic responsiveness for <= IE8 -->
<script src="js/respond.min.js"></script>

@yield('pre-app-js')

<!-- Project script (should load last) -->
<script src="js/app.js"></script>

@yield('post-app-js')

<!-- set the active navbar item -->
<script>
    $(document).ready(function() {
        $('#top_navbar li').removeClass('active');

        <?php
        if (!empty($navbar_itemName)) {
            // target the correct navbar item to display this page as selected
            echo '$(\'#' . $navbar_itemName . '\').addClass(\'active\');' ;
        }
        ?>
    });
</script>
<!-- --------------------------------- -->

</body>
</html>
