@extends('frontend.layouts.guide_layout')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<header class="guide-header">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('frontend.user.profile.chose_category')}}" class="btn btn-light my-btn mt-3 border">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                 Template Categories
            </a>
        </div>
        <div class="col-6 text-center mt-1">
            <h3>Choose a Template</h3>
            <h5>Get started quickly with a premade template! You can fully customize it later.</h5>
        </div>
        <div class="col-3">
            <a class="btn my-btn btn-light float-right mt-3 border">
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                Continue without a template
            </a>
        </div>
    </div>
</header>
<div class="container">
        <chose-template-component></chose-template-component>
        
</div>

                
@endsection
