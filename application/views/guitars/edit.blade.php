@layout('layouts.default')

@section('content')
<h3>Update guitar {{ ': ' . $guitar->model_friendly }}</h3>

{{ Form::open('guitars/update', 'PUT') }}

<p>
    {{ Form::label('model', 'Model') }}
    {{ Form::text('model', $guitar->model) }}

    {{ Form::label('model_friendly', 'Model Display Name') }}
    {{ Form::text('model_friendly', $guitar->model_friendly) }}

    {{ Form::label('prod_id', 'Product ID') }}
    {{ Form::text('prod_id', $guitar->prod_id) }}

    {{ Form::label('price', 'Price') }}
    {{ Form::text('price', $guitar->price) }}

    {{ Form::label('short_desc', 'Short Description') }}
    {{ Form::text('short_desc', $guitar->short_desc) }}

    {{ Form::hidden('id', $guitar->id) }}
    <!-- TODO: BOOTSTRAP: why do I need an empty label to have the submit button on its own line???? -->
    <label></label>
    {{ Form::submit('Update') }}
</p>

{{ Form::close() }}

@endsection