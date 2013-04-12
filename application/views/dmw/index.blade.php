@layout('layouts.default')

@section('content')

<!-- slideshow -->
<div class="row">
    <div id="home-carousel-id" class="carousel slide"><!-- class of slide for animation -->

        <ol class="carousel-indicators">
            <li data-target="#home-carousel-id" data-slide-to="0" class="active"></li>
            <li data-target="#home-carousel-id" data-slide-to="1"></li>
            <li data-target="#home-carousel-id" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active"><!-- class of active since it's the first item -->
                {{ HTML::image('img/Strat.jpg', 'Slide show Strat') }}
                <div class="carousel-caption">
                    <p>Dalton Custom S</p>
                </div>
            </div>
            <div class="item">
                {{ HTML::image('img/Godin.jpg', 'Slide show Godin') }}
                <div class="carousel-caption">
                    <p>Dalton Custom G</p>
                </div>
            </div>
            <div class="item">
                {{ HTML::image('img/335.jpg', 'Slide show 335') }}
                <div class="carousel-caption">
                    <p>Dalton Custom 35</p>
                </div>
            </div>
        </div><!-- /.carousel-inner -->
        <!--  Next and Previous controls below href values
              must reference the id for this carousel -->
        <a class="carousel-control left" href="#home-carousel-id" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#home-carousel-id" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
</div>

<!-- body copy -->
<div class="row">
    <div class="span6" align="justify">
        <p>
            Welcome to Dalton Musicworks. There is a single belief that guides our business:
        </p>
        <p align="center">
            <strong>YOU KNOW WHAT YOU WANT.</strong>
        </p>
        <p>
            It’s a tone…or a look. It’s a feel thing. It’s better intonation.
            It’s fit and finish.  It’s a U-shaped, one piece maple neck with a
            1.65” bone nut and a 7.5” to 9.5” compound radius fingerboard and
            jumbo frets.
        </p>

        <p>Whatever it is… it’s about you.  You know what you want.</p>
    </div>

    <div class="span6" align="justify">
        <p>
            We offer some very fine guitars and basses, along with an excellent selection of parts for those who prefer to roll their own. We only sell products that we                    use. If we can help you find what you need, that would be our privilege. If                    not, maybe we can help point you in the right direction. Never settle. You know                    what you want.
        </p>
    </div>
</div>


@endsection