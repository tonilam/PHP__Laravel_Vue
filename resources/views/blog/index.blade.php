@extends('layouts.app')

@section('content')
<div class="container blog-list" data-logged-as="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <router-view name="blogsIndex"></router-view>
            <router-view></router-view>
        </div>
    </div>
</div>

@endsection
