@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div class="container blog">
@else
<div class="container blog" data-logged-as="{{Auth::user()->id}}">
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <router-view name="viewBlog"></router-view>
            <router-view></router-view>
        </div>
    </div>
</div>

@endsection
