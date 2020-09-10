
    <div class="btn-group btn-group-sm" role="group" aria-label="@lang('labels.backend.guides.widgets.fields.actions')">
        <a href="{{ route('admin.guide.templates.widgets.destroy', $widget) }}"
           data-method="delete"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="@lang('buttons.general.crud.delete')"
           data-trans-title="@lang('strings.backend.general.are_you_sure')"
           class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
            <i class="fas fa-trash"></i>
        </a>
    </div>

