@if($category->active)
    <span class='badge badge-success'>@lang('labels.general.active')</span>
@else
    <span class='badge badge-danger'>@lang('labels.general.inactive')</span>
@endif