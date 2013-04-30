<!DOCTYPE HTML>
<?php
$language_code = Session::get('language_code', 'en');
?>
<html lang={{"\"" . $language_code . "\"" }}>
<head>

<!--    The following needs to be passed in:
            $title - Page Title
            $navbar_itemName - page's navbar item to be selected in top navbar.
                               This is one of the li #id targets in the navbar below.
-->

    <title>{{ 'Dalton Musicworks - ' . $title  }} </title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
<!--    {{ HTML::style('css/bootstrap/2.3.0/bootstrap.min.css') }}-->
<!--    {{ HTML::style('css/bootstrap/2.3.0/bootstrap-responsive.min.css') }}-->
    {{ HTML::style('css/bootstrap/2.3.1/bootstrap.min.css') }}

    <!-- Project -->
    {{ HTML::style('css/app.css') }}

    <!--  used by pviews which need to define in-page styles-->
    @yield('page-styles')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<!-- ----------- Wrap all page content ------------- -->
<div id="wrap">
    <!-- navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">

                <a id="navbar_logo" class="pull-left" href="{{ URL::base() }}">
                    {{ HTML::image('img/logo/DMWLogo35pxHigh.jpg', 'Dalton Musicworks logo') }}
                    <!-- Dalton Musicworks -->
                </a>

                <!-- Responsive Navbar -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- everything within this div will be hidden at 940px or less -->
                <div class="nav-collapse collapse">
                    <ul id="top_navbar" class="nav pull-right">
                        <li id="top_navbar_guitars">{{ HTML::link('guitars', Lang::line('navigation.guitars')->get($language_code), array('title' => 'Dalton Musicworks Guitars')) }}</li>
                        <li id="top_navbar_basses">{{ HTML::link('basses', Lang::line('navigation.basses')->get($language_code), array('title' => 'Dalton Musicworks Basses')) }}</li>
                        <li id="top_navbar_parts">{{ HTML::link('parts', Lang::line('navigation.parts')->get($language_code), array('title' => 'Dalton Musicworks Parts')) }}</li>
                        <li id="top_navbar_amps">{{ HTML::link('amps', Lang::line('navigation.amps')->get($language_code), array('title' => 'Dalton Musicworks Amps')) }}</li>
                        <li id="top_navbar_effects">{{ HTML::link('effects', Lang::line('navigation.effects')->get($language_code), array('title' => 'Dalton Musicworks Effects')) }}</li>
                        <li id="top_navbar_accessories" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::line('navigation.accessories')->get($language_code) }}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('cases', Lang::line('navigation.cases')->get($language_code), array('title' => 'Dalton Musicworks Accessories - Cases')) }}</li>
                                <li>{{ HTML::link('straps', Lang::line('navigation.straps')->get($language_code), array('title' => 'Dalton Musicworks Accessories - Straps')) }}</li>
                            </ul>
                        </li>

                        <li id="top_navbar_videos">{{ HTML::link('videos', Lang::line('navigation.videos')->get($language_code), array('title' => 'Dalton Musicworks Videos')) }}</li>
                        <li id="top_navbar_faq">{{ HTML::link('faq', Lang::line('navigation.faq')->get($language_code), array('title' => 'Dalton Musicworks FAQ')) }}</li>
                        <li id="top_navbar_howtobuy">{{ HTML::link('how-to-buy', Lang::line('navigation.howtobuy')->get($language_code), array('title' => 'Dalton Musicworks How to Buy')) }}</li>
                        <li id="top_navbar_about" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::line('navigation.about')->get($language_code) }}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link('about-philosophy', Lang::line('navigation.philosophy')->get($language_code), array('title' => 'Dalton Musicworks About Our Philosophy')) }}</li>
                                <li>{{ HTML::link('about-people', Lang::line('navigation.people')->get($language_code), array('title' => 'Dalton Musicworks About Our People')) }}</li>
                                <li>{{ HTML::link('about-brands', Lang::line('navigation.brands')->get($language_code), array('title' => 'Dalton Musicworks About Our Brands')) }}</li>
                            </ul>
                        </li>
                        <li id="top_navbar_contact">{{ HTML::link('contact', Lang::line('navigation.contact')->get($language_code), array('title' => 'Dalton Musicworks Contact Us')) }}</li>
                        <li>
                            <a href="{{ URL::to('cart') }}"><i class="icon-shopping-cart"></i></a>
                        </li>
                        <li>
                        <!-- set up the language link -->
                            <?php
                                $cur_URI = URI::current();
                                if ($cur_URI == "/")
                                    $cur_URI = "home";
                            ?>
                            @if ($language_code == "en")
                                <a href="{{ URL::to_route('switch-language', array('fr', $cur_URI)) }}"> FR</a>
                            @elseif ($language_code == "fr")
                                <a href="{{ URL::to_route('switch-language', array('en', $cur_URI)) }}"> EN</a>
                            @endif
                        </li>
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
                    <div id="footer_logo" class="span4">
                        <a class="brand" href="{{ URL::base() }}">
<!--                            {{ HTML::image('img/DMWLogo30pxHigh.jpg', 'Dalton Musicworks logo') }}-->
                             Dalton Musicworks
                        </a>
                    </div>

                    <div class="span8">
                        <ul id="footer_links" class="inline pull-right">
                            <!--  <li><a href="index.php">Home</a></li> -->
                            <li>{{ HTML::link('guitars', Lang::line('navigation.guitars')->get($language_code), array('title' => 'Dalton Musicworks Guitars')) }}</li>
                            <li>{{ HTML::link('basses', Lang::line('navigation.basses')->get($language_code), array('title' => 'Dalton Musicworks Basses')) }}</li>
                            <li>{{ HTML::link('parts', Lang::line('navigation.parts')->get($language_code), array('title' => 'Dalton Musicworks Parts')) }}</li>
                            <li>{{ HTML::link('amps', Lang::line('navigation.amps')->get($language_code), array('title' => 'Dalton Musicworks Amps')) }}</li>
                            <li>{{ HTML::link('effects', Lang::line('navigation.effects')->get($language_code), array('title' => 'Dalton Musicworks Effects')) }}</li>
                            <li>{{ HTML::link('videos', Lang::line('navigation.videos')->get($language_code), array('title' => 'Dalton Musicworks Videos')) }}</li>
                            <li>{{ HTML::link('faq', Lang::line('navigation.faq')->get($language_code), array('title' => 'Dalton Musicworks FAQ')) }}</li>
                            <li>{{ HTML::link('how-to-buy', Lang::line('navigation.howtobuy')->get($language_code), array('title' => 'Dalton Musicworks How to Buy')) }}</li>
                            <li>{{ HTML::link('contact', Lang::line('navigation.contact')->get($language_code), array('title' => 'Dalton Musicworks Contact Us')) }}</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="span5 offset5">
                        <span id="copyright" class="muted">Copyright &copy; 2013 West Island Web Design</span>
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
{{ HTML::script('js/bootstrap/2.3.1/bootstrap.min.js') }}

<!-- enable basic responsiveness for <= IE8 -->
{{ HTML::script('js/respond.min.js') }}

@yield('pre-app-js')

<!-- Project script (should load last) -->
{{ HTML::script('js/app.js') }}

@yield('post-app-js')

<!-- set the active navbar item -->
<script>
    $(document).ready(function() {
        /* override internal Bootstrap's icon path using Laravel methods rather than changing Bootstrap sources */
        <?php
            $icon_path = URL::to_asset('img/glyphicons-halflings.png');
            echo '$(\'[class^="icon-"], [class*=" icon-"]\').css(\'background-image\',\'url("' .  $icon_path . '")\');';
            echo "\r\n\t";
            $icon_path = URL::to_asset('img/glyphicons-halflings-white.png');
            echo '$(\'.icon-white\').css(\'background-image\',\'url("' .  $icon_path . '")\');';
        ?>

        $('#top_navbar li').removeClass('active');
        <?php
        if (!empty($navbar_itemName)) {
            // target the correct navbar item to display this page as selected
            echo '$(\'#' . $navbar_itemName . '\').addClass(\'active\');' ;
        }
        ?>

        /* Rather than adding code to Laravel's Paginator links(),
            we'll add the Bootstrap styling class dynamically with JS */
        $('.pagination').addClass('pagination-mini pagination-right');
    });
</script>
<!-- --------------------------------- -->

</body>
</html>
