@layout('layouts.default')

@section('content')
<h3>Error:</h3>

<div class="alert alert-error">
{{ urldecode($error) }}
</div>
@endsection