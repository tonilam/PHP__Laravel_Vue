@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}
                        <router-view name="userRegister"></router-view>
                        <router-view></router-view>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
