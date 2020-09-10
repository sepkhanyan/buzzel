<?php

Breadcrumbs::for('admin.guide-categories', function ($trail) {
    $trail->push('Guide Categories', route('admin.guide-categories'));
});

Breadcrumbs::for('admin.guide-categories-create', function ($trail) {
    $trail->parent('admin.guide-categories');
    $trail->push('Create Guide Categories', route('admin.guide-categories-create'));
});

Breadcrumbs::for('admin.guide.categories.edit', function ($trail, $category) {
    $trail->parent('admin.guide-categories');
    $trail->push('Edit Guide Categories', route('admin.guide.categories.edit', $category));
});

Breadcrumbs::for('admin.guide.categories.show', function ($trail, $category) {
    $trail->parent('admin.guide-categories');
    $trail->push('View Guide Categories', route('admin.guide.categories.show', $category));
});
//widgets
Breadcrumbs::for('admin.guide-widgets', function ($trail) {
    $trail->push('Guide Widgets', route('admin.guide-widgets'));
});

Breadcrumbs::for('admin.guide-widgets-create', function ($trail) {
    $trail->parent('admin.guide-widgets');
    $trail->push('Create Guide Widgets', route('admin.guide-widgets-create'));
});

Breadcrumbs::for('admin.guide.widgets.edit', function ($trail, $widget) {
    $trail->parent('admin.guide-widgets');
    $trail->push('Edit Guide Widgets', route('admin.guide-widgets-create', $widget));
});

Breadcrumbs::for('admin.guide.widgets.show', function ($trail, $widget) {
    $trail->parent('admin.guide-widgets');
    $trail->push('View Guide Widgets', route('admin.guide.widgets.show', $widget));
});

//widget fields
Breadcrumbs::for('admin.guide.widgets.fields', function ($trail, $widget) {
    $trail->parent('admin.guide-widgets');
    $trail->push($widget->title.' Fields', route('admin.guide.widgets.fields', $widget));
});

Breadcrumbs::for('admin.guide.widgets.fields.create', function ($trail, $widget) {
    $trail->parent('admin.guide-widgets');
    $trail->push($widget->title.' Fields', route('admin.guide.widgets.fields', $widget));
    $trail->push('Create Fields', route('admin.guide.widgets.fields.create', $widget));
});

Breadcrumbs::for('admin.guide.widgets.fields.edit', function ($trail, $widget, $field) {
    $trail->parent('admin.guide-widgets');
    $trail->push($widget->title.' Fields', route('admin.guide.widgets.fields', $widget));
    $trail->push('Edit Fields', route('admin.guide.widgets.fields.edit', [$widget, $field]));
});

//Templates
Breadcrumbs::for('admin.guide.templates', function ($trail) {
    $trail->push('Admin Templates', route('admin.guide.templates'));
});

Breadcrumbs::for('admin.guide.templates.create', function ($trail) {
    $trail->parent('admin.guide.templates');
    $trail->push('Create Templates', route('admin.guide.templates.create'));
});

Breadcrumbs::for('admin.guide.templates.edit', function ($trail, $template) {
    $trail->parent('admin.guide.templates');
    $trail->push('Edit Templates', route('admin.guide.templates.edit', $template));
});

Breadcrumbs::for('admin.guide.templates.show', function ($trail, $template) {
    $trail->parent('admin.guide.templates');
    $trail->push('Show Template', route('admin.guide.templates.show', $template));
});

//widget fields
Breadcrumbs::for('admin.guide.templates.widgets', function ($trail, $template) {
    $trail->parent('admin.guide.templates');
    $trail->push($template->title.' Widgets', route('admin.guide.templates.widgets', $template));
});

Breadcrumbs::for('admin.guide.templates.widgets.create', function ($trail, $template) {
    $trail->parent('admin.guide-widgets');
    $trail->push($template->title.' Fields', route('admin.guide.templates.widgets', $template));
    $trail->push('Add Widget', route('admin.guide.templates.widgets.create', $template));
});
?>