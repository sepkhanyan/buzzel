@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
<div class="main_container">
    <div class="row">
        <div class="col text-center">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row">

        <div class="col-9">
            <div class="col-md-10 order-2 order-sm-1">
                    <pending-guides-component></pending-guides-component>
            </div><!--col-md-8-->
        </div> <!-- col end -->
        <div class="col-3">
            @include('frontend.user.guide.partials.dashboard_side_nav') 
        </div>
    </div>
</div>
@endsection
