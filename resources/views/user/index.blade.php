@extends('layouts.app')

@section('content')@if (Auth::guest())
<div class="container user-list">
@else
<div class="container user-list" data-logged-as="{{Auth::user()->id}}" data-system-timezone="{{date_default_timezone_get()}}">
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <router-view name="usersIndex"></router-view>
            <router-view></router-view>
        </div>
    </div>
</div>

@endsection
