@extends('layouts.app')

@section('content')
<div class="container user-list">
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
                    <router-view name="usersIndex"></router-view>
                    <router-view></router-view>
                    @foreach($users as $user)
                    <div class="row user-list-item">
                        <div class="col-xs-5">{{$user['first_name']}} {{$user['last_name']}}</div>
                        <div class="col-xs-4">{{$user['created_at']}}</div>
                        <div class="col-xs-3">
                            <button class="btn btn-info col-xs-6">Edit</button>
                            <button class="btn btn-danger col-xs-6">Delete</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/crud.js"></script>
@endsection
