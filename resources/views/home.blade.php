@extends('layouts.app')

@section('content')
<div class="container dashboard">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row services">
                        <div class="item col-xs-6">
                            <a href="/users/"><span>Users</span>
                                <span class="icon glyphicon glyphicon-menu-right"></span></a>
                        </div>
                        <div class="item col-xs-6">
                            <a href="/blog/"><span>Blog</span>
                                <span class="icon glyphicon glyphicon-menu-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
