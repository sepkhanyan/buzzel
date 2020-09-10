<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.guides.tabs.content.overview.icon')</th>
                <td>
                    <div class="mt-2">
                        <img src="{{asset($category->getMedia('guide_categories')->first()->getUrl('thumb'))}}" alt="{{ ucwords($category->title) }}" class="img-thumbnail">
                    </div>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.tabs.content.overview.title')</th>
                <td>{{ $category->title }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.tabs.content.overview.description')</th>
                <td>{{ $category->description }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.guides.tabs.content.overview.status')</th>
                <td>@include('backend.guides.includes.active', ['template' => $category])</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->
