@extends('backend.layouts.app')

@section('title', __('labels.backend.guides.widgets.widgets') . ' | ' . __('labels.backend.guides.widgets.view'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.guides.widgets.widgets')
                    <small class="text-muted">@lang('labels.backend.guides.widgets.view')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-plug"></i> @lang('labels.backend.guides.widgets.tabs.titles.overview')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        @include('backend.guides.widgets.show.tabs.overview')
                    </div><!--tab-->
                </div><!--tab-content-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>@lang('labels.backend.templates.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($widget->created_at) }} ({{ $widget->created_at->diffForHumans() }}),
                    <strong>@lang('labels.backend.templates.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($widget->updated_at) }} ({{ $widget->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
