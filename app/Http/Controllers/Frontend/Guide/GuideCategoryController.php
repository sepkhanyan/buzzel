<?php

namespace App\Http\Controllers\Frontend\Guide;

use App\Repositories\Frontend\Guide\GuideCategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guides\GuideCategory;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.guide.index')->withCategories(
            $this->guideCategoryRepository->all()
        );
    }

}
