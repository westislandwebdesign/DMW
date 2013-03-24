@layout('layouts.default')

@section('content')
<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="">Home</a> <span class="divider">/</span></li>
            <li><a href="parts">Parts</a> <span class="divider">/</span></li>
            <li class="active">Bodies</li>
        </ul>
    </div>
</div>

<h1>Bodies</h1>
@foreach($bodies as $body)
    {{ $body->short_desc }} <br>
@endforeach

@endsection