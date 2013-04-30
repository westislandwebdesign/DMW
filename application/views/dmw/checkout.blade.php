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


        <!-- Hide the form if we have successfully sent it,
                        i.e. if 'success' is not found which will be the first time the the page is hit or
                                there was an error -->
        @if (!($success = Session::get('success')))

        <div class="row">
            <div class="span10">
                <p>
                    Dear customer:  Please note that we don’t do anonymous “click and buy” transactions.  We want to connect with you about your order.
                    Please fill in the form below to send us an email which will automatically include the list of items from your shopping cart.  We will confirm your order details, as well as any additional shipping fees and send you a PayPal invoice.  Your order will be processed upon confirmation of payment of the PayPal invoice.
                    We realize this process may take a little longer, but it ensures that we maintain the level of personal service that we strive to offer our clients.
                </p>
            </div>
        </div>



        <div class="row">
            <div class="span7">
                <div class="form-container">

                    {{ Form::open( URL::to('checkout'), 'POST') }}
                        <fieldset>
                        <legend>Reserve Your Items <small class="help">Required fields are indicated by a <em>*</em>.</small></legend>


                        <label for="name">Name: <em>*</em></label>
                        {{ Form::text('name', Input::old('name'), array('class' => 'formField input-block-level', 'placeholder' => 'Your Name', 'required' => 'required')) }}

                        <label for="email">Email: <em>*</em></label>
                        {{ Form::email('email', Input::old('email'), array('class' => 'formField input-block-level', 'placeholder' => 'name@example.com', 'required' => 'required')) }}

                        <label for="phone">Telephone:</label>
                        {{ Form::telephone('phone', Input::old('phone'), array('class' => 'formField input-block-level')) }}

                        <label for="message">Message:  <em>*</em></label>
                        {{ Form::textarea('message', Input::old('message'), array('class' => 'formField input-block-level', 'rows' => '8', 'placeholder' => 'You know what you want.', 'required' => 'required')) }}

                        {{ Form::submit('Send', array('class' => 'submitButton')) }}

                        <div class="hiddenCaptcha">
                            <input type="hidden" name="hiddenCaptcha" value="">
                        </div>
                        </fieldset>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="span5">
                <br>
                <br>
                <div class="well">
                    <p>Your order:</p>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="40%">Name</th>
                            <th width="8%">Qty.</th>
                            <th width="12%">Price</th>
                        </tr>
                        </thead>
                        @forelse ($cart_contents as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>{{ $item['price'] }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="6">Your shopping cart is empty.</td></tr>
                        @endforelse
                    </table>

                    <table class="table">
                        <tbody>
                        <tr>
                            <td width="63%" colspan="3"></td>
                            <td width="12%">Items</td>
                            <td width="12%">{{ Cartify::cart()->total_items() }}</td>
                        </tr>
                        <tr>
                            <td width="63%" colspan="3"></td>
                            <td width="12%">Total</td>
                            <td width="12%">{{ format_number(Cartify::cart()->total()) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        @endif

@endsection