<?php

namespace App\Http\Controllers\Frontend\Guide;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Guide\GuideCategoryRepository;
use App\Models\Guides\GuideWidget;
use Illuminate\Http\Request;
use App\Repositories\Backend\Guide\UserGuideRepository;
use App\Http\Requests\Backend\Guide\ManageUserGuideRequest;
use Auth;
use App\Models\Guides\UserGuideWidget;
use App\Models\Guides\UserGuideWidgetField;

class GuideController extends Controller
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
    public function __construct(GuideCategoryRepository $guideCategoryRepository, UserGuideRepository $userGuideRepository)
    {
        $this->guideCategoryRepository = $guideCategoryRepository;
        $this->userGuideRepository = $userGuideRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function build($guide_id)
    {
        $guide = $this->userGuideRepository->getById($guide_id);
        if($guide){
            return view('frontend.user.guide.build')->withGuide($guide);
        }
    }

    public function chose_category()
    {
        return view('frontend.user.guide.chose_category')->withCategories(
            $this->guideCategoryRepository->all()
        );
    }

    public function chose_template()
    {
        return view('frontend.user.guide.chose_template');
    }

    public function guide_details($template_id)
    {
        return view('frontend.user.guide.chose_guide_details')->withTemplateId($template_id);
    }
    public function save_guide(ManageUserGuideRequest $request){
        $response = $this->userGuideRepository->saveGuide($request);
        return response()->json(['guide_details' => $response], 200);

    }

    public function get_guide($guide_id){
        $response = $this->userGuideRepository->with('widgets')->getById($guide_id); 
        if($response){
            return response()->json(['guide_details' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function get_all_user_guides(){
        $user_id = Auth::user()->id;
        $response = $this->userGuideRepository->getByUserId($user_id);
        if($response){
            return response()->json(['guide_details' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function add_widget_guide($guide_id, $widget_id){
        $response = $this->userGuideRepository->addGuideWidget($guide_id, $widget_id);
        if($response){
            return response()->json(['widget' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function remove_widget_guide($guide_id, $widget_id){
        $response = $this->userGuideRepository->removeGuideWidget($guide_id, $widget_id);
        if($response){
            return response()->json(['message' => "Widget Removed", 'widget' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function get_widget_fields($widget_id){
        $response = $this->userGuideRepository->getWidgetFields($widget_id);
        if($response){
            return response()->json(['fields' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function update_user_guide_widget(Request $request){

        $widget = UserGuideWidget::find($request->id);
        if($widget){
            $savedata = [
                'title' => $request->title,
                'enabled' => $request->enabled,
                'web_browser' => $request->web_browser,
                'show_toolbar' => $request->show_toolbar,
                ];
                $widget->update($savedata);

                if($request->hasFile('icon_preview') && $request->file('icon_preview')->isValid()){
                    $widget->addMediaFromRequest('icon_preview')->toMediaCollection('user_guide_widget_icons');
                }
                return response()->json(['widget' => $widget], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function restore_guide_widget($id){
        $widget = UserGuideWidget::find($id);
        if($widget){
            $saveData = [];
            $parent = $widget->parent_widget;
            $savedata['title'] = $parent->title;
            $widget->update($savedata);
            $widget->clearMediaCollection('user_guide_widget_icons');
            return response()->json(['widget' => $widget], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function save_guide_widget_field_value(Request $request){
       
        $data = $request->all();
        $user_guide_widget_id = "";
        $guide_widget_field_id = "";
        //dd($data);
        foreach($data as $key=>$field_value){
            $field_obj = (array)json_decode($field_value); 
            if($field_obj['user_guide_widget_id']!='' && $field_obj['guide_widget_field_id']!=''){
                $user_guide_widget_id = $field_obj['user_guide_widget_id'];
                $guide_widget_field_id = $field_obj['guide_widget_field_id'];
                $mydata = UserGuideWidgetField::where("user_guide_widget_id", "=", $field_obj['user_guide_widget_id'])->where("guide_widget_field_id", "=", $field_obj['guide_widget_field_id'])->delete();

                foreach($field_obj['data'] as $k=>$b){
                    $saveData = [];
                    if($b!=''){
                        $saveData['user_guide_widget_id'] = $field_obj['user_guide_widget_id'];
                        $saveData['guide_widget_field_id'] = $field_obj['guide_widget_field_id'];
                        $saveData['key'] = $k;
                        $saveData['value'] = $b; 
                        UserGuideWidgetField::create($saveData);
                    }
                }
                
            }
        }

                return response()->json(['success' => "saved", "data"=>["user_guide_widget_id"=>$user_guide_widget_id, "guide_widget_field_id"=>$guide_widget_field_id]], 200);
    }

    public function get_guide_widget_field_value($widget_id, $field_id){ 
        $response = [];
        if($widget_id!='' && $field_id!=""){
            $field_value = UserGuideWidgetField::where("user_guide_widget_id", "=", $widget_id)->where("guide_widget_field_id", "=", $field_id)->with('fields')->get();
            if($field_value){
                foreach($field_value as $key=>$field){
                   
                    $response[$field->fields->type]['user_guide_widget_id'] = $field->user_guide_widget_id;
                    $response[$field->fields->type]['guide_widget_field_id'] = $field->guide_widget_field_id;
                    $response[$field->fields->type]['data'][$field->key] = $field->value;
                }
                
            }
            //echo "<pre>"; print_r($field_value);
            return response()->json(['data' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function get_album_fields($widget_id, $field_id){ 
        $response = [];
        if($widget_id!='' && $field_id!=""){
            $field_value = UserGuideWidgetField::where("user_guide_widget_id", "=", $widget_id)->where("guide_widget_field_id", "=", $field_id)->with('fields')->get();
            if($field_value){
                foreach($field_value as $key=>$field){
                   
                    $response[$field->fields->type]['user_guide_widget_id'] = $field->user_guide_widget_id;
                    $response[$field->fields->type]['guide_widget_field_id'] = $field->guide_widget_field_id;
                    $response[$field->fields->type]['data'][$field->key] = $field->value;
                }
                
            }
            //echo "<pre>"; print_r($field_value);
            return response()->json(['data' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function get_ads_fields($widget_id, $field_id){ 
        $response = [];
        if($widget_id!='' && $field_id!=""){
            $field_value = UserGuideWidgetField::where("user_guide_widget_id", "=", $widget_id)->where("guide_widget_field_id", "=", $field_id)->with('fields')->get();
            if($field_value){
                foreach($field_value as $key=>$field){
                   
                    $response[$field->fields->type]['user_guide_widget_id'] = $field->user_guide_widget_id;
                    $response[$field->fields->type]['guide_widget_field_id'] = $field->guide_widget_field_id;
                    $response[$field->fields->type]['data'][$field->key] = $field->value;
                }
                
            }
            //echo "<pre>"; print_r($field_value);
            return response()->json(['data' => $response], 200);
        }else{
            return response()->json(['error' => "Not Found"], 404);
        }
    }

    public function getWebsite(Request $request){
        $url = $request->url;
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $response=curl_exec($ch);
        curl_close($ch);

        //dd($response);
        return response()->json(['data' => $response], 200);
    }

    public function getWebsite2(Request $request){
        $url = $request->url;
       // echo $url; die;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $response=curl_exec($ch);
        curl_close($ch);

        //dd($response);
        return $response;
    }

}
