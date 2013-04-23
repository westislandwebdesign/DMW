@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li>{{ HTML::link('', 'Home ') }}<span class="divider">/</span></li>
            <li>{{ HTML::link('parts', 'Parts ') }}<span class="divider">/</span></li>
            <li>{{ HTML::link($part->part_route($part->category), $part->category_name_for_breadcrumbs($part->category) . ' ') }}<span class="divider">/</span></li>
            <li class="active">{{ $part->model_friendly }}</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span5">
        <?php
            $item_image = HTML::image("img/parts/$part->category/$part->prod_id" . "-big.jpg", $part->model_friendly);
        ?>
        {{ $item_image }}
    </div>

    <div class="span7">
        <div class="row">
            <div class="span7">
                <h2 class""> {{ $part->model_friendly }}  </h2>
            </div>
        </div>

        <div class="row">
            <div class="span7">
                {{ $part->long_desc }}
            </div>
        </div>

        <div class="row">
            <div class="span7">
                <h3>Price: &#36;{{ $part->price }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="span7">
                {{ Form::open('add-to-cart', 'POST') }}
                    {{ Form::hidden('prod_id', $part->prod_id, array('id' => 'prod_id' )) }}
                    {{ Form::hidden('image', $item_image) }}
                    {{ Form::hidden('part_page_link', HTML::link(URL::current(), $part->model_friendly)) }}

                    {{ Form::button('Add to Cart', array('type' => 'submit', 'class' => 'btn btn-primary pull-left')) }}
                 {{ Form::close() }}
            </div>
        </div>


    </div>
</div>



@endsection