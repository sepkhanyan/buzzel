@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.categories') )

@section('content')
<div class="main_container">
    <div class="col">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fa fas fa-tachometer-alt"></i> @lang('navs.frontend.categories')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="card mb-2 bg-light text-center">
                        <img class="card-img-top rounded-circle img-thumbnail profile_pic mt-4" style="height: 100px;" src="{{asset($category->getMedia('guide_categories')->first()->getUrl('thumb'))}}" alt="{{$category->title}}">

                            <div class="card-body">
                                <h4 class="card-title">
                                    {{$category->title}}<br/>
                                </h4>

                                <p class="card-text">

                          {{$category->description}}
                                </p>
                                <a href="{{route('frontend.guide.front.category.template', $category)}}" class="btn btn-primary">Select & View Template1</a>
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
