<?php

namespace App\Http\Controllers\Frontend\Guide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guides\Templates\GuideTemplate;
use App\Repositories\Frontend\Template\GuideTemplateRepository;


class GuideTemplateController extends Controller
{
        
    /**
     * @var GuideTemplateRepository
     */
    protected $guideTemplateRepository;

    /**
     * GuideTemplateController constructor.
     *
     * @param GuideTemplateRepository $guideTemplateRepository
     */
    public function __construct(GuideTemplateRepository $guideTemplateRepository)
    {
        $this->guideTemplateRepository = $guideTemplateRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function templatebycategory($category)
    {
        return view('frontend.template.listbycategory')->withTemplates(
            $this->guideTemplateRepository->findBycategoryid($category)
        );
    }
}
