@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li>{{ HTML::link('', 'Home ') }}<span class="divider">/</span></li>
            <li>{{ HTML::link('parts', 'Parts ') }}<span class="divider">/</span></li>
            <li class="active">{{ $part_category }}</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span12">

            @if (!$parts_paginator->results)
                <h3>Sorry, no {{ $part_category }} are available at this time.</h3>
            @else
                <ul class="thumbnails">
                    @foreach($parts_paginator->results as $part)
                        <?php $part_details_href = "/parts/$part->model"; ?>
                        <li class="span4">
                            <div class="thumbnail product-thumb">
                                <p class="text-center">
                                    <a href="{{ URL::to($part_details_href) }}">
                                        {{ HTML::image("img/parts/$part->category/$part->prod_id" . ".jpg", $part->model_friendly) }}
                                    </a>
                                </p>
                                <h4 class="text-center">{{ $part->model_friendly }}</h4>
                                <p> {{ $part->short_desc }}</p>
                                <p class="text-center">
                                    <a href="{{ URL::to($part_details_href) }}" role="button" class="btn btn-primary">View details &raquo;</a>
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

        <!-- display pagination links -->
        {{ $parts_paginator->links() }}

    </div>
</div>


@endsection