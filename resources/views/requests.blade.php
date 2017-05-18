@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Write on your friend's Slambook</div>

                <div class="panel-body">
					@if(count($id))
                    <ol>
                    <?php $j = 0; ?>
                    @foreach($id as $i)
                        @if(count($i))
                        @foreach($i as $is)
                        <li><a href="{!! route('page', $reqs[$j]) !!}">{{ $is->name }}</a></li>
                        <?php $j++; ?> 
                        @endforeach
                        @endif
                    @endforeach
                    @else
                    <h4>No one has requested you yet</h4>
                    @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection