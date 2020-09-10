<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\Guide\GuideWidgetRepository;
use App\Repositories\Backend\Guide\GuideCategoryRepository;
use App\Repositories\Backend\Template\GuideTemplateRepository;
use App\Repositories\Backend\Guide\UserGuideRepository;
use App\Http\Requests\Backend\Guide\ManageUserGuideRequest;


class GuideController extends Controller
{

    /**
     * GuideWidgetController constructor.
     *
     * @param GuideWidgetRepository $guideWidgetRepository
     */
    public function __construct(GuideWidgetRepository $guideWidgetRepository, GuideCategoryRepository $guideCategoryRepository, GuideTemplateRepository $guideTemplateRepository, UserGuideRepository $userGuideRepository)
    {
        $this->guideWidgetRepository = $guideWidgetRepository;
        $this->guideCategoryRepository = $guideCategoryRepository;
        $this->guideTemplateRepository = $guideTemplateRepository;
        $this->userGuideRepository = $userGuideRepository;
    }

            /**
      @OA\Get(
          path="/get-guide-widget",
          tags={"Widgets"},
          summary="To get all widgets",
          operationId="all_widgets",
      
          @OA\Parameter(
              name="token",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),       
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/
    public function getGuideWidget(){
        $widgets =   $this->guideWidgetRepository->getAll();
        return response()->json(['widgets' => $widgets], 200);
    }

                /**
      @OA\Get(
          path="/get-guide-categories",
          tags={"categories"},
          summary="To get all categories",
          operationId="all_categories",
      
          @OA\Parameter(
              name="token",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),       
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/
    public function getGuideCategory(){
        $widgets =   $this->guideCategoryRepository->getAll();
        return response()->json(['categories' => $widgets], 200);
    }

                    /**
      @OA\Get(
          path="/get-guide-templates",
          tags={"templates"},
          summary="To get all templates",
          operationId="selected_template",
      
          @OA\Parameter(
              name="token",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),   
          @OA\Parameter(
              name="category_id",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),               
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/
    public function getGuideTemplate($category_id){
        $templates =   $this->guideTemplateRepository->getByCategory($category_id);
        return response()->json(['templates' => $templates], 200);
    }

/**
      @OA\Post(
          path="/downloadGuide",
          tags={"DownloadGuide"},
          summary="get guide from scan/passphrase",
          operationId="selected_guide",
      
          @OA\Parameter(
              name="guide_id",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),    
          @OA\Parameter(
              name="passphrase",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),      
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/
    public function downloadGuide(Request $request){
        $guide_id = $request->guide_id;
        $passphrase = $request->passphrase;
        $guide = $this->userGuideRepository->getGuide($guide_id, $passphrase);
        //print_r($guide);; die;
        //dd($guide);
        if($guide){
            return response()->json(['guide' => $guide[0]], 200);
        }else{
            return response()->json(['message' => "Invalid guide"], 401);
        }
    }




    
}
