@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Blog Post</div>

                <div class="panel-body">
                    <a class="page-scroll btn btn-primary" href="#Tag" data-toggle="modal">Tag</a>

                    <br><br>

                    @include('layouts.alert')
                    {!! Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]) 
                    !!}

                    {!! Form::text('title', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Give a title to your post', 
                        'required']
                        )
                    !!}

                    <br>

                    {!! Form::textarea('post', null, [
                        'class' => 'form-control', 
                        'placeholder' => 'Write a post', 
                        'required']
                        )
                    !!}

                    <br>

                    {!! Form::submit('Submit', ['class'=>'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add notice Modal -->
<div class="modal fade" id="Tag" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Tag your friends</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" role="form" method="POST" id="newNoticeForm" action="{{ url('tag') }}">
                {{ csrf_field() }}

                <h4>Tagged people can edit the post.</h4>
        
                <div class="form-group{{ $errors->has('selected') ? ' has-error' : '' }}">
                    <div class="col-md-6">

                        <?php $i = 0; ?>
                        @if(!empty($users))
                        @foreach($users as $user)
                        <?php $i++; ?> 
                        <input id="user{{ $i }}" type="checkbox" name="users[]" value="{{ $user->_id }}">
                        {{ $user->name }}<br>
                        @endforeach
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">
                            Done
                        </button>
                    </div>
                </div>

            </form>

        </div>
      </div>
      
    </div>
</div>

@endsection
