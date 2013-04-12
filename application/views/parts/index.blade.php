@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('bodies') }}">
                        {{ HTML::image('img/parts/bodies.jpg', 'Bodies') }}
                        <h4>Bodies</h4>
                    </a>

                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('fixed-bridges') }}">
                        {{ HTML::image('img/parts/bridges-fixed.jpg', 'Fixed Bridges') }}
                        <h4>Fixed Bridges</h4>
                    </a>

                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('tremolo-bridges') }}">
                        {{ HTML::image('img/parts/bridges-trem2.jpg', 'Tremolo Bridges') }}
                        <h4>Tremolo Bridges</h4>
                    </a>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('hardware') }}">
                        {{ HTML::image('img/parts/hardware.jpg', 'Hardware') }}
                        <h4>Hardware</h4>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('machine-heads') }}">
                        {{ HTML::image('img/parts/machine-heads.jpg', 'Machine Heads') }}
                        <h4>Machine Heads</h4>
                    </a>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('necks') }}">
                        {{ HTML::image('img/parts/necks.jpg', 'Necks') }}
                        <h4>Necks</h4>
                    </a>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('pickguards') }}">
                        {{ HTML::image('img/parts/pickguards.jpg', 'Pickguards') }}
                        <h4>Pickguards</h4>
                    </a>
                </div>
            </li>

            <li class="span3">
                <div class="thumbnail">
                    <a href="{{ URL::to('pickups') }}">
                        {{ HTML::image('img/parts/pickups.jpg', 'Pickups') }}
                        <h4>Pickups</h4>
                    </a>
                </div>
            </li>

        </ul>
    </div>
</div>

@endsection