@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tell a friend to write on your Slambook</div>

                <div class="panel-body">
                	@include('layouts.alert')
					{{ Form::open(array('url' => 'search')) }}
					{{ Form::text('name', '', array('placeholder' => 'Enter a name here', 'class' => "col-sm-3")) }}<br><br>
					{{ Form::submit('Search', array('class' => 'btn btn-primary')) }}<br><br>
					{{ Form::close() }}

					@if(!empty($results))
					<legend>Results</legend>
					<ol>
					@foreach($results as $result)
				       	
				       	<li><a href="{!! route('profile', $result->_id) !!}">{{ $result->name }}</a></li>
				        
				    @endforeach
					@endif
					</ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection