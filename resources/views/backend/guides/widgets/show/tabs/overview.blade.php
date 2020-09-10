<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.guides.widgets.tabs.content.overview.icon')</th>
                <td>
                    <div class="mt-2">
                        <img src="{{asset($widget->getMedia('guide_widgets_backend')->first()->getUrl('thumb'))}}" alt="{{ ucwords($widget->title) }}" class="img-thumbnail">
                    </div>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.widgets.tabs.content.overview.title')</th>
                <td>{{ $widget->title }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.widgets.tabs.content.overview.description')</th>
                <td>{{ $widget->description }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.widgets.tabs.content.overview.status')</th>
                <td>@include('backend.guides.widgets.includes.active', ['widget' => $widget])</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
