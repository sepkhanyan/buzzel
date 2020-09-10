@extends('frontend.layouts.guide_layout')

@section('title', app_name() . ' | ' . __('navs.frontend.categories') )

@section('content')
<div class="main_container">
    <router-view></router-view>
</div>
@endsection