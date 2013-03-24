@layout('layouts.default')

@section('content')
    <h3>Add a guitar to the database.</h3>

    {{ Form::open('guitars/new', 'POST') }}

        <p>
            {{ Form::label('model', 'Model') }}
            {{ Form::text('model', Input::old('model')) }}

            {{ Form::label('model_friendly', 'Model Display Name') }}
            {{ Form::text('model_friendly', $guitar->model_friendly) }}

            {{ Form::label('prod_id', 'Product ID') }}
            {{ Form::text('prod_id', Input::old('prod_id')) }}

            {{ Form::label('price', 'Price') }}
            {{ Form::text('price', Input::old('price')) }}

            {{ Form::label('short_desc', 'Short Description') }}
            {{ Form::text('short_desc', Input::old('short_desc')) }}

            <!-- TODO: BOOTSTRAP: why do I need an empty label to have the submit button on its own line???? -->
            <label></label>
            {{ Form::submit('Create') }}
        </p>

    {{ Form::close() }}

@endsection