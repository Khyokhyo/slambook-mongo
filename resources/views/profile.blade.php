@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tell a friend to write on your Slambook</div>

                <div class="panel-body">
                	@include('layouts.alert')
					<h3>{{ $result->name }}</h3>
                    <h5>{{ $result->email }}</h5>
                    @if(!count($already))
                    <a href="{!! route('send', $result->_id) !!}" class="btn btn-success">Send request</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection