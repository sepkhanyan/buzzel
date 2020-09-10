@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.guides.widgets.fields.fields'))

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
                    {{ __('labels.backend.guides.widgets.fields.fields') }} <small class="text-muted">{{ __('labels.backend.guides.widgets.fields.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.guides.widgets.fields.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.guides.widgets.fields.table.key')</th>
                            <th>@lang('labels.backend.guides.widgets.fields.table.description')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fields as $field)
                                <tr>
                                <td>{{ $field->field_key }}</td>
                                    <td>{{ $field->description }}</td>
                                    <td>@include('backend.guides.widgets.fields.includes.actions', ['field' => $field, 'widget' => $widget])</td>
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
                    {!! $fields->total() !!} {{ trans_choice('labels.backend.guides.widgets.fields.table.total', $fields->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $fields->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
