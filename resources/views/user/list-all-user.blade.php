@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of Users</div>

                <div class="panel-body">
                    <div class="row table-header">
                        <div class="col-xs-5">Name</div>
                        <div class="col-xs-4">Created at</div>
                        <div class="col-xs-3">Action</div>
                    </div>
                    @foreach($users as $user)
                    <div class="row">
                        <div class="col-xs-5">{{$user['first_name']}} {{$user['last_name']}}</div>
                        <div class="col-xs-4">{{$user['created_at']}}</div>
                        <div class="col-xs-3">
                            <button class="col-xs-6">Edit</button>
                            <button class="col-xs-6">Delete</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
