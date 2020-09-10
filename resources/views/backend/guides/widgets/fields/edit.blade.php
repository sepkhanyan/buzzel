@extends('backend.layouts.app')

@section('title', __('labels.backend.guides.widgets.fields.fields') . ' | ' . __('labels.backend.guides.widgets.fields.edit'))

@section('content')

{{ html()->modelForm($field, 'PATCH', route('admin.guide.widgets.fields.update',$widget))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.guides.widgets.fields.fields')
                        <small class="text-muted">@lang('labels.backend.guides.widgets.fields.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            {{ html()->hidden('id', $field->id) }}
            {{ html()->hidden('widget_id', $widget->id) }}
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.widgets.fields.title'))
                            ->class('col-md-2 form-control-label')
                            ->for('field_key') }}

                        <div class="col-md-10">
                            {{ html()->text('field_key')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.guides.widgets.fields.title'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.widgets.fields.type'))
                            ->class('col-md-2 form-control-label')
                            ->for('type') }}

                        <div class="col-md-10">
                            {{ html()->textarea('type')
                                ->class('form-control')
                                ->placeholder("{type: text}")
                                ->required()
                                ->autofocus() }}
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Comma separated options (facebook, twitter, youtube, vimeo, map, album, ads)
                            </small>                                
                        </div><!--col-->

                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.widgets.fields.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.guides.widgets.fields.description'))
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.guide.widgets.fields', $widget), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
