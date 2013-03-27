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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap/2.3.0/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap/2.3.0/bootstrap-responsive.min.css') }}

    @yield('pre-app-headerlinks')

    <!-- Project -->
    {{ HTML::style('css/app.css') }}

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
                <a id="navbar_logo" class="pull-left" href="{{ URL::base() }}">
                    {{ HTML::image('img/DMWLogo40pxHigh.jpg', 'Dalton Musicworks logo') }}
                    <!-- Dalton Musicworks -->
                </a>
                <div class="nav-collapse collapse">
                    <ul id="top_navbar" class="nav pull-right">
                        <li id="top_navbar_guitars">{{ HTML::link('guitars', 'Guitars', array('title' => 'Dalton Musicworks Guitars')) }}</li>
                        <li id="top_navbar_basses">{{ HTML::link('basses', 'Basses', array('title' => 'Dalton Musicworks Basses')) }}</li>
                        <li id="top_navbar_parts">{{ HTML::link('parts', 'Parts', array('title' => 'Dalton Musicworks Parts')) }}</li>
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
<!--                        </li>-->
                        <li id="top_navbar_amps">{{ HTML::link('amps', 'Amps', array('title' => 'Dalton Musicworks Amps')) }}</li>
                        <li id="top_navbar_effects">{{ HTML::link('effects', 'Effects', array('title' => 'Dalton Musicworks Effects')) }}</li>
                        <li id="top_navbar_videos">{{ HTML::link('videos', 'Videos', array('title' => 'Dalton Musicworks Videos')) }}</li>
                        <li id="top_navbar_faq">{{ HTML::link('faq', 'FAQ', array('title' => 'Dalton Musicworks FAQ')) }}</li>
                        <li id="top_navbar_howtobuy">{{ HTML::link('how-to-buy', 'How to Buy', array('title' => 'Dalton Musicworks How to Buy')) }}</li>
                        <li id="top_navbar_about" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('about-philosophy', 'Philosophy', array('title' => 'Dalton Musicworks About Our Philosophy')) }}</li>
                                <li>{{ HTML::link('about-people', 'People', array('title' => 'Dalton Musicworks ABout Our People')) }}</li>
                                <!--                            <li><a href="#">FAQ</a></li>-->
                                <!--                            <li><a href="#">How to Buy</a></li>-->
                            </ul>
                        </li>
                        <li id="top_navbar_contact">{{ HTML::link('contact', 'Contact Us', array('title' => 'Dalton Musicworks Contact Us')) }}</li>
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
                    <div class="span4">
                        <a id="footer_logo" class="brand" href="{{ URL::base() }}">
                            {{ HTML::image('img/DMWLogo40pxHigh.jpg', 'Dalton Musicworks logo') }}
                            <!-- Dalton Musicworks -->
                        </a>
                    </div>

                    <div class="span8">
                        <ul id="footer_links" class="inline pull-right">
                            <!--  <li><a href="index.php">Home</a></li> -->
                            <li>{{ HTML::link('guitars', 'Guitars', array('title' => 'Dalton Musicworks Guitars')) }}</li>
                            <li>{{ HTML::link('basses', 'Basses', array('title' => 'Dalton Musicworks Basses')) }}</li>
                            <li>{{ HTML::link('parts', 'Parts', array('title' => 'Dalton Musicworks Parts')) }}</li>
                            <li>{{ HTML::link('amps', 'Amps', array('title' => 'Dalton Musicworks Amps')) }}</li>
                            <li>{{ HTML::link('effects', 'Effects', array('title' => 'Dalton Musicworks Effects')) }}</li>
                            <li>{{ HTML::link('videos', 'Videos', array('title' => 'Dalton Musicworks Videos')) }}</li>
                            <li>{{ HTML::link('faq', 'FAQ', array('title' => 'Dalton Musicworks FAQ')) }}</li>
                            <li>{{ HTML::link('how-to-buy', 'How to Buy', array('title' => 'Dalton Musicworks How to Buy')) }}</li>
<!--                            <li>{{ HTML::link('about-philosophy', 'Philosophy', array('title' => 'Dalton Musicworks About Our Philosophy')) }}</li>-->
<!--                            <li>{{ HTML::link('about-people', 'People', array('title' => 'Dalton Musicworks ABout Our People')) }}</li>-->
                            <li>{{ HTML::link('contact', 'Contact Us', array('title' => 'Dalton Musicworks Contact Us')) }}</li>
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
{{ HTML::script('js/jquery-1.9.1.min.js') }}

<!-- Bootstrap -->
{{ HTML::script('js/bootstrap/2.3.0/bootstrap.min.js') }}

<!-- enable basic responsiveness for <= IE8 -->
{{ HTML::script('js/respond.min.js') }}

@yield('pre-app-js')

<!-- Project script (should load last) -->
{{ HTML::script('js/app.js') }}

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
