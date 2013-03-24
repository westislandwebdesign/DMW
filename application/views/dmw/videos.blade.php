@layout('layouts.default')

@section('content')
    <div class="row">
        <div class="span6 offset3">
            <h4 id="VideosHeader">Check out another episode of PHIL'S FILLS!</h4>
        </div>
    </div>

    <div class="row">
        <div class="span6 offset3">
            <div class="VideoContainer">
                <img src="img/CJKC2011Preview.jpg" alt="Video background image">

                <a  class="VideoPlayButton" data-toggle="modal" href="#video">
                    <img src="img/playbutton.png" alt="Video play button">
                </a>
            </div>
            <p class="text-center">We will be able to pop-up videos and see all the great gear in action.</p>
        </div>
    </div>

    <div class="modal hide" id="video">
        <div class="modal-header">
            <button type="bt" class="close" data-dismiss="modal">x</button>
            <h4>PHIL'S FILLS - Episode 1:&nbsp; The Dalton Custom S</h4>
        </div>
        <div class="modal-body">
            <p>This text gets replaced with video modal.</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
        </div>
    </div>
@endsection

@section('pre-app-js')
<!-- instantiate video modal -->
<script src="js/video-modal.js"></script>
@endsection