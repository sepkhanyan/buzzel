@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.guides.widgets.widgets'))


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
                    {{ __('labels.backend.guides.widgets.widgets') }} <small class="text-muted">{{ __('labels.backend.guides.widgets.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.guides.widgets.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.guides.widgets.table.icon')</th>
                            <th>@lang('labels.backend.guides.widgets.table.title')</th>
                            <th>@lang('labels.backend.guides.widgets.table.status')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($widgets as $widget)
                                <tr>
                                    <td><img src="{{asset($widget->getMedia('guide_widgets_backend')->first()->getUrl('thumb'))}}" alt="{{ ucwords($widget->title) }}" class="img-thumbnail"></td>
                                    <td>{{ ucwords($widget->title) }}</td>
                                    <td>@include('backend.guides.widgets.includes.active')</td>
                                    <td>@include('backend.guides.widgets.includes.actions', ['widget' => $widget])</td>
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
                    {!! $widgets->total() !!} {{ trans_choice('labels.backend.guides.widgets.table.total', $widgets->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $widgets->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
