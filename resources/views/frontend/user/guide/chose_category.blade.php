@extends('frontend.layouts.guide_layout')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<header class="guide-header">
    <div class="row">
        <div class="col">
            <a href="{{ route('frontend.user.dashboard')}}" class="btn btn-light my-btn mt-3 border">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                 Back to your Dashboard
            </a>
        </div>
        <div class="col text-center mt-1">
            <h3>Welcome!</h3>
            <h5>What kind of guide are you looking to build?</h5>
        </div>
        <div class="col">
            <a class="btn my-btn btn-light float-right mt-3 border">
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                Start from saved template
            </a>
        </div>
    </div>
</header>
<div class="container">
        <chose-category-component></chose-category-component>
        
</div>
                
@endsection
