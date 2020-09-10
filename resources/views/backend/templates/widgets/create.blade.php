@extends('backend.layouts.app')

@section('title', __('labels.backend.guides.widgets.fields.fields') . ' | ' . __('labels.backend.guides.widgets.fields.create'))

@section('content')
{{ html()->form('POST', route('admin.guide.templates.widgets.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.templates.widgets.name')
                        <small class="text-muted">@lang('labels.backend.templates.widgets.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            {{ html()->hidden('guide_template_id', $template->id) }}
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('template_title') }}

                        <div class="col-md-10">
                            {{ html()->text('template_title')
                                ->value($template->title)
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->readonly() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.select_widgets'))
                            ->class('col-md-2 form-control-label')
                            ->for('categories') }}

                        <div class="col-md-10">
                            {{ html()->select()
                                ->name('widget_id')
                                ->class('form-control')
                                ->options($widgets)
                                ->placeholder(__('validation.attributes.backend.templates.select_widgets'))
                                ->required()
                                ->multiple()
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.guide.templates.widgets', $template), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
