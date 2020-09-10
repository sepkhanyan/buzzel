<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides\GuideWidgetField;
use App\Models\Guides\GuideWidget;
use App\Repositories\Backend\Guide\GuideWidgetFieldRepository;
use App\Http\Requests\Backend\Guide\ManageGuideWidgetFieldRequest;
use App\Http\Requests\Backend\Guide\StoreGuideWidgetFieldRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideWidgetFieldRequest;

class GuideWidgetFieldController extends Controller
{
           /**
     * @var guideWidgetFieldRepository
     */
    protected $guideWidgetFieldRepository;
    
    /**
     * GuideWidgetFieldController constructor.
     *
     * @param GuideWidgetFieldRepository $guideWidgetRepository
     */
    public function __construct(GuideWidgetFieldRepository $guideWidgetFieldRepository)
    {
        $this->guideWidgetFieldRepository = $guideWidgetFieldRepository;
    }

    /**
     * @param ManageGuideWidgetFieldRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGuideWidgetFieldRequest $request, GuideWidget $widget)
    {
        return view('backend.guides.widgets.fields.index')
        ->withWidget($widget)
        ->withFields($this->guideWidgetFieldRepository->getByWidgetPaginated($widget->id, 25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageGuideWidgetFieldRequest $request, GuideWidget $widget)
    {
        return view('backend.guides.widgets.fields.create')
        ->withWidget($widget);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGuideWidgetFieldRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuideWidgetFieldRequest $request, GuideWidget $widget)
    { 
        $this->guideWidgetFieldRepository->create($request);

        return redirect()->route('admin.guide.widgets.fields', $widget)->withFlashSuccess(__('alerts.backend.guides.widgets.fields.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ManageGuideWidgetFieldRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageGuideWidgetFieldRequest $request, GuideWidget $widget, GuideWidgetField $field)
    {

        return view('backend.guides.widgets.fields.edit')
        ->withWidget($widget)
        ->withField($field);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGuideWidgetFieldRequest $request
     * @param GuideWidget $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideWidgetFieldRequest $request, GuideWidget $widget, GuideWidgetField $field)
    {
        $field = $field->find($request->id);
        $this->guideWidgetFieldRepository->update($field, $request);

        return redirect()->route('admin.guide.widgets.fields', $widget)->withFlashSuccess(__('alerts.backend.guides.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ManageGuideWidgetRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageGuideWidgetFieldRequest $request, GuideWidget $widget, GuideWidgetField $field)
    {
        $this->guideWidgetFieldRepository->deleteById($field->id);

        //event(new GuideWidgetDeleted($category));

        return redirect()->route('admin.guide.widgets.fields', $widget)->withFlashSuccess(__('alerts.backend.guides.fields.deleted'));
    }
}
