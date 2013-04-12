@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            @foreach($guitars as $guitar)
                <?php $guitar_details_href = "/guitars/$guitar->model"; ?>
                <li class="span4">
                    <div class="thumbnail product-thumb">
                        <p class="text-center">
                            <a href="{{ URL::to($guitar_details_href) }}">
                            {{ HTML::image('img/Guitar.jpg', 'Guitar') }}
                            </a>
                        </p>
                        <h4 class="text-center">{{ $guitar->model_friendly }}</h4>
                        <p> {{ $guitar->short_desc }}</p>
                        <p class="text-center">
                            <a href="{{ URL::to($guitar_details_href) }}" role="button" class="btn btn-primary">View details &raquo;</a>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!--<div class="row">-->
<!--    <div class="span12">-->
<!--        <ul class="thumbnails">-->
<!--            <li class="span4">-->
<!--                <div class="thumbnail">-->
<!--                    <p class="text-center"><a href="#">-->
<!--                            <img src="img/Guitar.jpg" alt="Guitar">-->
<!--                        </a>-->
<!--                    </p>-->
<!--                    <h3 class="text-center">Awesome Guitar</h3>-->
<!--                    <p>In auctor felis at sem blandit vestibulum eget non urna. Aenean facilisis nisl quis lorem porta tempor. Integer facilisis aliquet.</p>-->
<!--                    <p class="text-center">-->
<!--                        <a href="#" role="button" class="btn btn-primary">View details &raquo;</a>-->
<!--                    </p>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div?-->

@endsection