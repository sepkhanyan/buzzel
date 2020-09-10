@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.templates') )

@section('content')
<div class="main_container">
    <div class="col">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fa fas fa-tachometer-alt"></i> @lang('navs.frontend.templates')
                        <a href="{{route('frontend.guide.front.categories')}}" class="btn btn-primary justify-content-end" style="float: right">Back to Categories</a>
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        @foreach($templates as $template)
                        <div class="card mb-2 bg-light text-center">
                            <div style="background-image: url({{asset($template->getMedia('guide_templates_banner')->first()->getUrl('thumb'))}})">
                                <img class="card-img-top rounded-circle img-thumbnail profile_pic mt-4" style="height: 100px;" src="{{asset($template->getMedia('guide_templates_icon')->first()->getUrl('thumb'))}}" alt="{{$template->title}}">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{$template->title}}<br/>
                                </h4>

                                <p class="card-text">
                                    {{$template->description}}
                                </p>
                                <a href="#" class="btn btn-light">Learn More</a>
                            <a href="{{route('frontend.auth.register')}}" class="btn btn-primary">Choose</a>
                            </div>
                        </div>
                        @endforeach
                                
                    </div><!--row-->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
</div> <!-- col end -->
</div>
@endsection
