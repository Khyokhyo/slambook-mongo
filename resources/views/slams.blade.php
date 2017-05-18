@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                <ul>
                	@include('layouts.alert')
				
					@if(count($requests))
					<div><br>

					@if(!empty($questions))
                    @foreach($questions as $question)
                    	<?php $a = 'Ans' . $question->_id; $ans = $requests->$a; ?>
                        <h4>{{ $question->question }}</h4>
						<ul><li>{{ $ans }}</li></ul>
                        <br>
                    @endforeach

					<a  href="{!! route('edit', $requests->_id) !!}" class="btn btn-warning" role="button">Send edit request</a>
					</div><br>

                    @endif

				    @else
				    <h4>No one has written on your Slambook yet</h4>
					@endif
					
				   	@if(!empty($prev))
				   	<a  href="{{route('postSlams', $prev)}}" class="btn btn-info" role="button">Prev</a>
				   	@endif

				   	@if(!empty($next))
				   	<a  href="{{route('postSlams', $next)}}" class="btn btn-primary" role="button">Next</a><br>
				   	@endif
				</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection