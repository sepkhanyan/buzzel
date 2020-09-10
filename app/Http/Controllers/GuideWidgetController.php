<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides\GuideWidget;
use App\Repositories\Backend\Guide\GuideWidgetRepository;
use App\Http\Requests\Backend\Guide\ManageGuideWidgetRequest;
use App\Http\Requests\Backend\Guide\StoreGuideWidgetRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideWidgetRequest;

class GuideWidgetController extends Controller
{
        /**
     * @var GuideWidgetRepository
     */
    protected $guideWidgetRepository;
    
    /**
     * GuideWidgetController constructor.
     *
     * @param GuideWidgetRepository $guideWidgetRepository
     */
    public function __construct(GuideWidgetRepository $guideWidgetRepository)
    {
        $this->guideWidgetRepository = $guideWidgetRepository;
    }

    /**
     * @param ManageGuideWidgetRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGuideWidgetRequest $request)
    {
        return view('backend.guides.widgets.index')
        ->withWidgets($this->guideWidgetRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageGuideWidgetRequest $request)
    {
        return view('backend.guides.widgets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGuideWidgetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuideWidgetRequest $request)
    { 
        $this->guideWidgetRepository->create($request);

        return redirect()->route('admin.guide-widgets')->withFlashSuccess(__('alerts.backend.guides.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ManageGuideWidgetRequest $request, GuideWidget $widget)
    {
        return view('backend.guides.widgets.show')
            ->withWidget($widget);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ManageGuideCategoryRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageGuideWidgetRequest $request, GuideWidget $widget)
    {

        return view('backend.guides.widgets.edit')
        ->withWidget($widget);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGuideWidgetRequest $request
     * @param GuideWidget $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideWidgetRequest $request, GuideWidget $widget)
    {
        $this->guideWidgetRepository->update($widget, $request);

        return redirect()->route('admin.guide-widgets')->withFlashSuccess(__('alerts.backend.guides.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ManageGuideWidgetRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageGuideWidgetRequest $request, GuideWidget $widget)
    {
        $this->guideWidgetRepository->deleteById($widget->id);

        //event(new GuideWidgetDeleted($category));

        return redirect()->route('admin.guide-widgets')->withFlashSuccess(__('alerts.backend.guides.deleted'));
    }

    /**
     * get the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function getGuideWidget(){


        $widgets =   $this->guideWidgetRepository->getAll();
        return response()->json(['widgets' => $widgets], 200);

    }
}
