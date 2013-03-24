@layout('layouts.default')

@section('content')
<div class="row">
    <div class="span6">
        <!-- Email Form -->
        <h3>Get in Touch!</h3>

        {{ Form::open('contact', 'POST') }}
            <label>Your Name</label>
            <input type="text" class="span4" id="yourName" placeholder="Stik E. Frets">

            <label>Your Email</label>
            <input type="text" class="span4" id="yourEmail" placeholder="guitarHero@shredme.com">

            <label>What's Up?</label>
            <textarea rows="10" class="span5" placeholder="You guys rock!"></textarea>

            <!-- Bootstrap:: why do we need this just to have the submit button line up under the message box???? -->
            <label></label>
            <input type="submit" value="Send">
        {{ Form::close() }}

    </div>

    <div class="span6">
        <!--Map-->
        <h3>Where We are:</h3>
        <!-- Clicking this placeholder fires the mapModal Reveal modal -->
        <p>
            <a href="#myModal" role="button" class="btn" data-toggle="modal"><img src="img/Map.jpg" /></a>
        </p>
        <p><a href="#myModal" role="button" class="btn" data-toggle="modal">View Map</a></p>
        <p>
            123 Awesome St.<br />
            Somewhere, Earth<br />
            NCC-1701
        </p>

        <!-- Map Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Where We Are</h3>
            </div>

            <div class="modal-body">
                <p><img src="img/MapBig.jpg"></p>
            </div>

            <!--                    <div class="modal-footer">-->
            <!--                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
            <!--                    </div>-->
        </div>
        <!-- --------- -->
    </div>
</div>
@endsection