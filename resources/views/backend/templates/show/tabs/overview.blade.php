<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.icon')</th>
                <td>
                    <div class="mt-2">
                        <img src="{{asset($template->getMedia('guide_templates_icon')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail">
                    </div>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.banner')</th>
                <td>
                    <div class="mt-2">
                        <img src="{{asset($template->getMedia('guide_templates_banner')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail">
                    </div>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.category')</th>
                <td>{{ $template->category }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.title')</th>
                <td>{{ $template->title }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.description')</th>
                <td>{{ $template->description }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.templates.tabs.content.overview.status')</th>
                <td>@include('backend.templates.includes.active', ['template' => $template])</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
