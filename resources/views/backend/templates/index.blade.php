@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.templates.admin_templates'))

@push('after-style')
    {!! style('vendors/datatables/datatables.min.css') !!}
    {!! style('vendors/datatables/datatables.bootstrap4.css') !!}
    {!! style('vendors/datatables/Responsive-2.2.2/css/responsive.dataTables.min.css') !!}
    {!! style('vendors/datatables/Select-1.3.0/css/select.dataTables.min.css') !!}

@endpush

@section('content')
    <div class="card-body">

        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.templates.templates') }} <small class="text-muted">{{ __('labels.backend.templates.admin_templates') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.templates.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.templates.table.icon')</th>
                            <th>@lang('labels.backend.templates.table.banner')</th>
                            <th>@lang('labels.backend.templates.table.category')</th>
                            <th>@lang('labels.backend.templates.table.title')</th>
                            <th>@lang('labels.backend.templates.table.status')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                                <tr>
                                    <td><img src="{{asset($template->getMedia('guide_templates_icon')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail"></td>
                                    <td><img src="{{asset($template->getMedia('guide_templates_banner')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail"></td>
                                    <td>{{ ucwords($template->category) }}</td>
                                    <td>{{ ucwords($template->title) }}</td>
                                    <td>@include('backend.templates.includes.active')</td>
                                    <td>@include('backend.templates.includes.actions', ['template' => $template])</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $templates->total() !!} {{ trans_choice('labels.backend.guides.table.total', $templates->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $templates->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
