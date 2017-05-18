@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                @include('layouts.alert')
                <ul>
                    
                    <h3>Hello {{ ucwords(Auth::user()->name) }}</h3>
                    <p>Welcome to your online slambook profile. Now you can get your slambook filled by your friends with a few simple steps.</p>

                    <ul><li>Go to 'Search' to look for your friends</li></ul>
                    <ul><li>Click on 'Send Request' asking them to write on your slambook</li></ul><br>

                    <p>Writing on your friend's slambook is simple too. You can write if your friend has sent you a request to write on his/her slambook.</p>

                    <ul><li>Go to 'Requests' on menu bar</li></ul>
                    <ul><li>Click on a name</li></ul>
                    <ul><li>Fill up the fields as your wish and save</li></ul>
                    <ul><li>If you don't want to answer, click on delete</li></ul><br>

                    <p>So what are you waiting for?</p><br>

                    <h4>Get Set Go...</h4><br>
                    <a class="btn btn-primary" href="{!! route('slams') !!}">View my slambook</a>
                </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
