@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
<div class="main_container">
    <div class="col">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-2 order-1 order-sm-2  mb-4">
                            <div class="card mb-2 bg-light text-center">
                                <img class="card-img-top rounded-circle img-thumbnail profile_pic mt-4" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fa fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                            <i class="fa fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1 btn-block">
                                            <i class="fa fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                        </a>

                                        @can('view backend')
                                            &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                                <i class="fa fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                            </a>
                                        @endcan
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-2">
                                <div class="card-header"><i class="fa fa-mobile" aria-hidden="true"></i> @lang('navs.frontend.guide.create_title')</div>
                                <div class="card-body">
                                    <p class="card-text"> @lang('navs.frontend.guide.guide_desc')</p>
                                    <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1 btn-block">
                                        <i class="fa fa-plus" aria-hidden="true"></i> @lang('navs.frontend.guide.create_btn')
                                    </a>
                                </div>
                            </div><!--card-->
                        </div><!--col-md-4-->

                        <div class="col-md-10 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="https://mediacdn.guidebook.com/upload/gears/guidetemplate/cover/film_festival.png" alt="Card image cap">

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                                <div class="col">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="https://mediacdn.guidebook.com/upload/gears/guidetemplate/cover/film_festival.png" alt="Card image cap">

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->                                <div class="col">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="https://mediacdn.guidebook.com/upload/gears/guidetemplate/cover/film_festival.png" alt="Card image cap">

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                                <div class="col">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="https://mediacdn.guidebook.com/upload/gears/guidetemplate/cover/film_festival.png" alt="Card image cap">

                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                                
                            </div><!--row-->

                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
</div> <!-- col end -->
</div>
@endsection
