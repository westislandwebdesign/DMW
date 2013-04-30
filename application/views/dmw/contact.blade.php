@layout('layouts.default')

@section('page-styles')
<!-- we need to put this style here so that we can use php to dynamically determine the image path -->
<style>
    <?php
        $accept_img = URL::to_asset('img/form/accept.png');
        $error_img = URL::to_asset('img/form/error.png');
        $email_error_img = URL::to_asset('img/form/email_error.png');
    ?>
    input:focus:required:invalid {
        background-image: url('{{ $error_img }}');
        background-position: 98% center;
        background-repeat: no-repeat;
    }

    input:required:valid {
        background-image: url('{{ $accept_img }}');
        background-position: 98% center;
        background-repeat: no-repeat;
    }

    input[type="email"]:focus:required:invalid {
        background-image: url('{{ $email_error_img }}');
    }
</style>
@endsection

@section('content')

<div class="row">
    <div class="span12">
        @if ($success = Session::get('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ $success }}
        </div>
        @endif
        @if ($error = Session::get('error'))
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong> {{ $error }}
        </div>
        @endif
        @if ($warning = Session::get('warning'))
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Warning!</strong> {{ $warning }}
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="span6">
        <!-- Email Form -->
        <h3>Get in Touch!</h3>

        <div class="form-container">
        {{ Form::open( URL::to('contact'), 'POST') }}
            <label for="name">Name: <em>*</em></label>
            {{ Form::text('name', Input::old('name'), array('class' => 'formField input-block-level', 'placeholder' => 'Your Name', 'required' => 'required')) }}

            <label for="email">Email: <em>*</em></label>
            {{ Form::email('email', Input::old('email'), array('class' => 'formField input-block-level', 'placeholder' => 'name@example.com', 'required' => 'required')) }}

            <label for="message">Message:  <em>*</em></label>
            {{ Form::textarea('message', Input::old('message'), array('class' => 'formField input-block-level', 'rows' => '8', 'placeholder' => 'You know what you want.', 'required' => 'required')) }}

            {{ Form::submit('Send', array('class' => 'submitButton')) }}

            <div class="hiddenCaptcha">
                <input type="hidden" name="hiddenCaptcha" value="">
            </div>
        {{ Form::close() }}
        </div>

    </div>

    <div class="span6">
        <!--Map-->
        <h3>Where We are:</h3>
        <address>
            <strong>Dalton Musicworks</strong><br>
            123 Awesome St.<br>
            Somewhere, Earth<br>
            NCC-1701<br>
            <abbr title="Phone">P:</abbr>(123) 555-000
        </address>

        <p>
            <a href="#myModal" role="button" class="btn" data-toggle="modal">
                {{ HTML::image('img/contact/Map.jpg', 'Where we are on map') }}
            </a>
        </p>
        <p><a href="#myModal" role="button" class="btn" data-toggle="modal">View Map</a></p>


        <!-- Map Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h3 id="myModalLabel">Where We Are</h3>
            </div>

            <div class="modal-body">
                <p>{{ HTML::image('img/contact/MapBig.jpg', 'Where we are on map') }}</p>
            </div>

            <!--                    <div class="modal-footer">-->
            <!--                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
            <!--                    </div>-->
        </div>
        <!-- --------- -->
    </div>
</div>
@endsection