@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.guides.categories'))


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
                    {{ __('labels.backend.guides.categories') }} <small class="text-muted">{{ __('labels.backend.guides.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.guides.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.guides.table.icon')</th>
                            <th>@lang('labels.backend.guides.table.title')</th>
                            <th>@lang('labels.backend.guides.table.status')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td><img src="{{asset($category->getMedia('guide_categories')->first()->getUrl('thumb'))}}" alt="{{ ucwords($category->title) }}" class="img-thumbnail"></td>
                                    <td>{{ ucwords($category->title) }}</td>
                                    <td>@include('backend.guides.includes.active')</td>
                                    <td>@include('backend.guides.includes.actions', ['category' => $category])</td>
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
                    {!! $categories->total() !!} {{ trans_choice('labels.backend.guides.table.total', $categories->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $categories->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
