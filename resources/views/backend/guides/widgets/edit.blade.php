@extends('backend.layouts.app')

@section('title', __('labels.backend.guides.widgets.widgets') . ' | ' . __('labels.backend.guides.widgets.edit'))

@section('content')

{{ html()->modelForm($widget, 'PATCH', route('admin.guide.widgets.update', $widget))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.guides.widgets.widgets')
                        <small class="text-muted">@lang('labels.backend.guides.widgets.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.widgets.title'))
                            ->class('col-md-2 form-control-label')
                            ->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.guides.widgets.title'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.widgets.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('title') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.guides.widgets.description'))
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.icon'))
                            ->class('col-md-2 form-control-label')
                            ->for('icon') }}
                        <div class="col-md-10">
                            {{ html()->file('icon')
                                ->class('form-control')
                                ->autofocus() }}
                        <div class="mt-2">
                            <img src="{{asset($widget->getMedia('guide_widgets_backend')->first()->getUrl('thumb'))}}" alt="{{ ucwords($widget->title) }}" class="img-thumbnail">
                        </div>
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.guides.active'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('active', $widget->active)->class('switch-input') }}
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.guide-widgets'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
