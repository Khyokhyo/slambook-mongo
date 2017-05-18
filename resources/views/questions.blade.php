@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set questions for your Slambook</div>

                <div class="panel-body">
                	@include('layouts.alert')
					{{ Form::open(array('url' => 'addQuestion')) }}
					{{ Form::text('question', '', array('placeholder' => 'Add a question here', 'class' => "col-sm-6")) }}<br><br>
					{{ Form::submit('Add New', array('class' => 'btn btn-primary')) }}<br><br>
					{{ Form::close() }}

					@if(!empty($results))
					<legend>Questions on your Slambook</legend>
					<ol>
					@foreach($results as $result)
				    	<li>{{ $result->question }}</li>
				    	<a class="btn btn-xs btn-danger" href="{!! route('deleteQuestion', $result->_id) !!}">Delete</a><br><br>
				    @endforeach
					@endif
					</ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection