@extends('layouts.app')

@section('content')
<div class="container user-list">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <router-view name="usersIndex"></router-view>
            <router-view></router-view>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection
