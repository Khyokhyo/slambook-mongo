@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Write on your friend's Slambook</div>

                <div class="panel-body">

                    @include('layouts.alert')
                    {!! Form::model($id, [
                        'route' => 'store',
                        'method' => 'put'
                      ]) 
                    !!}

                    @if(!empty($ques))
                    @foreach($ques as $q)
                        <h4>{{ $q->question }}</h4>
                        <?php $a = 'Ans' . $q->_id; $ans = $id->$a; ?>
                        {!! Form::text( $q->_id, $ans, [
                            'class' => 'form-control', 
                            'placeholder' => '']
                            )
                        !!}
                        <br>
                    @endforeach
                    @endif

                    {!! Form::hidden('request_id', $id->_id, [
                        'class' => 'form-control']
                        )
                    !!}

                    {!! Form::hidden('sender_id', $id->sender_id, [
                        'class' => 'form-control']
                        )
                    !!}

                    <br>

                    {!! Form::submit('Save', ['class'=>'form-control btn-success', 'style' => 'width:100px;']) !!}

                    <br>

                    <a class="btn btn-danger" style="width:100px;" href="{!! route('delete', $id->_id) !!}">Delete</a>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
