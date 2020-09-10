<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides\GuideCategory;
use App\Repositories\Backend\Guide\GuideCategoryRepository;
use App\Http\Requests\Backend\Guide\ManageGuideCategoryRequest;
use App\Http\Requests\Backend\Guide\StoreGuideCategoryRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideCategoryRequest;
use App\Events\Backend\Guide\GuideCategoryDeleted;

class GuideCategoryController extends Controller
{

    /**
     * @var GuideCategoryRepository
     */
    protected $guideCategoryRepository;
    
    /**
     * GuideCategoryController constructor.
     *
     * @param GuideCategoryRepository $guideCategoryRepository
     */
    public function __construct(GuideCategoryRepository $guideCategoryRepository)
    {
        $this->guideCategoryRepository = $guideCategoryRepository;
    }

    /**
     * @param ManageGuideCategoryRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGuideCategoryRequest $request)
    {
        return view('backend.guides.index')
        ->withCategories($this->guideCategoryRepository->getPaginated(25, 'id', 'asc'));
        // $categories = GuideCategory::all();
        // return view('backend.guides.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageGuideCategoryRequest $request)
    {
        return view('backend.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGuideCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuideCategoryRequest $request)
    { 
        $this->guideCategoryRepository->create($request);

        return redirect()->route('admin.guide-categories')->withFlashSuccess(__('alerts.backend.guides.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ManageGuideCategoryRequest $request, GuideCategory $category)
    {
        return view('backend.guides.show')
            ->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ManageGuideCategoryRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageGuideCategoryRequest $request, GuideCategory $category)
    {

        return view('backend.guides.edit')
        ->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateGuideCategoryRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideCategoryRequest $request, GuideCategory $category)
    {
        $this->guideCategoryRepository->update($category, $request);

        return redirect()->route('admin.guide-categories')->withFlashSuccess(__('alerts.backend.guides.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ManageGuideCategoryRequest $request
     * @param GuideCategory $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageGuideCategoryRequest $request, GuideCategory $category)
    {
        $this->guideCategoryRepository->deleteById($category->id);

        //event(new GuideCategoryDeleted($category));

        return redirect()->route('admin.guide-categories')->withFlashSuccess(__('alerts.backend.guides.deleted'));
    }
}
