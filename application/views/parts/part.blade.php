@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li>{{ HTML::link('', 'Home ') }}<span class="divider">/</span></li>
            <li>{{ HTML::link('parts', 'Parts ') }}<span class="divider">/</span></li>
            <li>{{ HTML::link($part->part_route($part->category), $part->friendly_category($part->category) . ' ') }}<span class="divider">/</span></li>
            <li class="active">{{ $part->model_friendly }}</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span5">
        {{ HTML::image("img/parts/$part->category/$part->prod_id" . "-big.jpg", $part->model_friendly) }}
    </div>

    <div class="span7">
        <div class="row">
            <div class="span7">
                <h3> {{ $part->model_friendly }}  </h3>
            </div>

            <div class="span7">
                {{ $part->long_desc }}
            </div>


        </div>


    </div>
</div>



@endsection