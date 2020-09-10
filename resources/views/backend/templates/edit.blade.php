@extends('backend.layouts.app')

@section('title', __('labels.backend.templates.templates') . ' | ' . __('labels.backend.templates.edit'))

@section('content')

{{ html()->modelForm($template, 'PATCH', route('admin.guide.templates.update', $template))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.templates.admin_templates')
                        <small class="text-muted">@lang('labels.backend.templates.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <hr>
            {{ html()->hidden('id', $template->id) }}
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.title'))
                            ->class('col-md-2 form-control-label')
                            ->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.templates.title'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.description'))
                            ->class('col-md-2 form-control-label')
                            ->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.templates.description'))
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.icon'))
                            ->class('col-md-2 form-control-label')
                            ->for('icon') }}

                        <div class="col-md-10">
                            {{ html()->file('icon')
                                ->class('form-control')
                                ->autofocus() }}
                        <div class="mt-2">
                            <img src="{{asset($template->getMedia('guide_templates_icon')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail">
                        </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.banner'))
                            ->class('col-md-2 form-control-label')
                            ->for('banner') }}

                        <div class="col-md-10">
                            {{ html()->file('banner')
                                ->class('form-control')
                                ->autofocus() }}
                        <div class="mt-2">
                            <img src="{{asset($template->getMedia('guide_templates_banner')->first()->getUrl('thumb'))}}" alt="{{ ucwords($template->title) }}" class="img-thumbnail">
                        </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.categories'))
                            ->class('col-md-2 form-control-label')
                            ->for('categories') }}

                        <div class="col-md-10">
                            {{ html()->select()
                                ->name('category_id')
                                ->class('form-control')
                                ->value($template->guide_category_id)
                                ->options($categories)
                                ->placeholder(__('validation.attributes.backend.templates.categories'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.templates.active'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('active', $template->active)->class('switch-input') }}
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
                    {{ form_cancel(route('admin.guide.templates'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
