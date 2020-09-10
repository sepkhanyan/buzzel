<?php

namespace App\Http\Controllers\Backend\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guides\Templates\GuideTemplate;
use App\Models\Guides\GuideCategory;
use App\Repositories\Backend\Template\GuideTemplateRepository;
use App\Http\Requests\Backend\Template\ManageGuideTemplateRequest;
use App\Http\Requests\Backend\Template\StoreGuideTemplateRequest;
use App\Http\Requests\Backend\Template\UpdateGuideTemplateRequest;
use App\Events\Backend\Template\GuideTemplateDeleted;
use App\Repositories\Backend\Template\GuideTemplateWidgetRepository;
use App\Http\Requests\Backend\Template\ManageGuideTemplateWidgetRequest;
use App\Http\Requests\Backend\Template\StoreGuideTemplateWidgetRequest;
use App\Models\Guides\GuideWidget;
use App\Models\Guides\Templates\GuideTemplateWidget;

class GuideTemplateController extends Controller
{
    
    /**
     * @var GuideCategoryRepository
     */
    protected $guideTemplateRepository;
    
    /**
     * GuideTemplateController constructor.
     *
     * @param GuideTemplateRepository $guideTemplateRepository
     */
    public function __construct(GuideTemplateRepository $guideTemplateRepository, GuideTemplateWidgetRepository $guideTemplateWidgetRepository)
    {
        $this->guideTemplateRepository = $guideTemplateRepository;
        $this->guideTemplateWidgetRepository = $guideTemplateWidgetRepository;
    }

    /**
     * @param ManageGuideTemplateRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGuideTemplateRequest $request)
    {
        return view('backend.templates.index')
        ->withTemplates($this->guideTemplateRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageGuideTemplateRequest $request)
    {
        $widgets = GuideWidget::active()->pluck('title', 'id');
        $categories = GuideCategory::active()->pluck('title', 'id');
        return view('backend.templates.create')
                ->withCategories($categories)
                ->withWidgets($widgets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGuideTemplateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuideTemplateRequest $request)
    { 
        $this->guideTemplateRepository->create($request);

        return redirect()->route('admin.guide.templates')->withFlashSuccess(__('alerts.backend.templates.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ManageGuideTemplateRequest $request, GuideTemplate $template)
    {
        return view('backend.templates.show')
            ->withTemplate($template);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ManageGuideTemplateRequest $request
     * @param GuideTemplate $template
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageGuideTemplateRequest $request, GuideTemplate $template)
    {
        $categories = GuideCategory::active()->pluck('title', 'id');
        $widgets = GuideWidget::active()->pluck('title', 'id');
        return view('backend.templates.edit')
        ->withCategories($categories)
        ->withTemplate($template)
        ->withWidgets($widgets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGuideTemplateRequest $request
     * @param GuideTemplate $template
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideTemplateRequest $request, GuideTemplate $template)
    {
        $template = $template->find($request->id);
        $this->guideTemplateRepository->update($template, $request);

        return redirect()->route('admin.guide.templates')->withFlashSuccess(__('alerts.backend.templates.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ManageGuideTemplateRequest $request
     * @param GuideTemplate $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageGuideTemplateRequest $request, GuideTemplate $template)
    {
        $this->guideTemplateRepository->deleteById($template->id);

        //event(new GuideTemplateDeleted($template));

        return redirect()->route('admin.guide.templates')->withFlashSuccess(__('alerts.backend.templates.deleted'));
    }


    /**
     * Display the widgets for specific template.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function widgets(ManageGuideTemplateRequest $request, GuideTemplate $template)
    {
        $widgets = $this->guideTemplateWidgetRepository->getWidgetBytemplate($template->id); 
        return view('backend.templates.widgets.index')
            ->withWidgets($widgets)
            ->withTemplate($template);
    }



        /**
     * Remove the specified resource from storage.
     *
     * @param  ManageGuideTemplateRequest $request
     * @param GuideTemplate $template
     * @return \Illuminate\Http\Response
     */
    public function removeWidget(ManageGuideTemplateWidgetRequest $request, GuideTemplateWidget $widget)
    {
        $this->guideTemplateWidgetRepository->deleteById($widget->id);
        return redirect()->route('admin.guide.templates.widgets', $widget->guide_template_id)->withFlashSuccess(__('alerts.backend.templates.deleted'));
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_widgets(ManageGuideTemplateWidgetRequest $request, GuideTemplate $template)
    { 
        $widgets = GuideWidget::active()->pluck('title', 'id');
        return view('backend.templates.widgets.create')
                ->withTemplate($template)
                ->withWidgets($widgets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGuideTemplateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store_widgets(StoreGuideTemplateWidgetRequest $request)
    { 
        $this->guideTemplateWidgetRepository->create($request);

        return redirect()->route('admin.guide.templates.widgets', $request->guide_template_id)->withFlashSuccess(__('alerts.backend.templates.widgets.created'));
    }
    
}
