@extends('frontend.layouts.guide_layout')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<chose-guide-details placeholder_image_path="{{env('APP_URL')}}"></chose-guide-details>    
            
@endsection
