<?php

namespace App\Repositories\Backend\Guide;

use App\Models\Guides\UserGuide;
use App\Models\Guides\UserGuideWidget;
use App\Models\Guides\GuideWidget;
use App\Models\Guides\Templates\GuideTemplateWidget;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Guide\StoreUserGuideRequest;
use App\Http\Requests\Backend\Guide\UpdateUserGuideRequest;
use App\Http\Requests\Backend\Guide\ManageUserGuideRequest;
use Auth;
use App\Models\Guides\GuideWidgetField;
/**
 * Class UserGuideRepository.
 */
class UserGuideRepository extends BaseRepository
{
    /**
     * UserGuideRepository constructor.
     *
     * @param  UserGuide  $model
     */
    public function __construct(UserGuide $model)
    {
        $this->model = $model;
        $this->user_id = $user = Auth::id();
    }


    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)->get();
    }

    /**
     * @param StoreUserGuideRequest $request
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(StoreUserGuideRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            $widget = $this->model::create([
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ]);
                
            // See if file uploaded
            if($request->hasFile('icon') && $request->file('icon')->isValid()){
                $widget->addMediaFromRequest('icon')->toMediaCollection('guide_widgets_backend');
            }

            if ($widget) {

                //event(new GuideCategoryCreated($category));

                return $widget;
            }

            throw new GeneralException(__('exceptions.backend.guides.widgets.create_error'));
        });
        
    }

    /**
     * @param UserGuide  $widget
     * @param UpdateUserGuideRequest $request
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(UserGuide $widget, UpdateUserGuideRequest $request)
    {

        return DB::transaction(function () use ($widget, $request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            
            if ($widget->update([
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ])) {

                // See if file uploaded
                if($request->hasFile('icon') && $request->file('icon')->isValid()){
                    //remove older files
                    $widget->clearMediaCollection('guide_widgets_backend');
                    $widget->addMediaFromRequest('icon')->toMediaCollection('guide_widgets_backend');
                }
                //event(new GuideCategoryUpdated($category));

                return $widget;
            }

            throw new GeneralException(__('exceptions.backend.guides.widgets.update_error'));
        });
    }

    public function saveGuide(ManageUserGuideRequest $request)
    {
        //dd($request->all());

        //update
        if(isset($request->id) && $request->id!=''){
            $userGuide = $this->getById($request->id);
            if($userGuide){
                
                return DB::transaction(function () use ($userGuide, $request) {
                   
                    $savedata = [];
                    $result = [];
                    foreach($request->all() as $key=>$data){
                        $savedata[$key] = $data;
                    }
                    unset($savedata['icon']);
                    unset($savedata['banner']);
                    unset($savedata['icon_preview']);
                    unset($savedata['banner_preview']);
                    $savedata['user_id'] = Auth::id();
                    $savedata['timezone'] = "Asia/kolkata";
                    $saved = $userGuide->update($savedata);
                    if ($saved) {
        
                        // See if file uploaded
                        if($request->hasFile('icon_preview') && $request->file('icon_preview')->isValid()){
                            //remove older files
                            $userGuide->clearMediaCollection('user_guide_icon');
                            $userGuide->addMediaFromRequest('icon_preview')->toMediaCollection('user_guide_icon');
                           // $result['icon'] = $userGuide->getMedia('user_guide_icon')->first()->getUrl('thumb'); 
                            //$result['icon'] = $userGuide->icon; 
                            
                        }
                        if($request->hasFile('banner_preview') && $request->file('banner_preview')->isValid()){
                            //remove older files
                            $userGuide->clearMediaCollection('user_guide_banner');
                            $userGuide->addMediaFromRequest('banner_preview')->toMediaCollection('user_guide_banner');
                           // $result['banner'] = $userGuide->getMedia('user_guide_banner')->first()->getUrl('thumb');
                           // $result['banner'] = $userGuide->banner;   
                        }
                        //event(new GuideCategoryUpdated($category));

                        $file = UserGuide::find($request->id);
                        if($file ->getMedia('user_guide_icon')->first()){
                            $result['icon'] = $file ->getMedia('user_guide_icon')->first()->getUrl('thumb'); 
                        }
                        if($file ->getMedia('user_guide_banner')->first()){
                            $result['banner'] = $file ->getMedia('user_guide_banner')->first()->getUrl('thumb');
                        }
                        $result['guide'] = $savedata;
                        return $result;
                    }
                    
                });
            }
        }else{
            //create new
            $userGuide = new UserGuide();
            return DB::transaction(function () use ($userGuide, $request) {
                $savedata = [];
                $result = [];
                foreach($request->all() as $key=>$data){
                    if(trim($data)!=''){
                        $savedata[$key] = $data;
                    }
                }
                unset($savedata['icon']);
                unset($savedata['banner']);
                $savedata['timezone'] = "Asia/kolkata";
                $savedata['user_id'] = Auth::id();
                $saved = $userGuide->create($savedata);
                if ($saved) {
                    
                    // See if file uploaded
                    if($request->hasFile('icon_preview') && $request->file('icon_preview')->isValid()){
                        
                       
                        $userGuide->addMediaFromRequest('icon_preview')->toMediaCollection('user_guide_icon');
                        //$result['icon'] = $userGuide->getMedia('user_guide_icon')->first()->getUrl('thumb'); 
                    }
                    if($request->hasFile('banner_preview') && $request->file('banner_preview')->isValid()){
                        
                        $userGuide->addMediaFromRequest('banner_preview')->toMediaCollection('user_guide_banner');
                        //$result['banner'] = $userGuide->getMedia('user_guide_banner')->first()->getUrl('thumb');
                    }
                    //event(new GuideCategoryUpdated($category));
                    //dd($saved->id);
                   

                        //save template widget to user guide widget
                        $template_widgets = GuideTemplateWidget::where("guide_template_id", "=", $request->guide_template_id)->with("widget")->get();
                        $guide_id = $saved->id;
                        if($template_widgets){
                            //$user_guide_widget = new UserGuideWidget();
                            
                            foreach($template_widgets as $relation){ 
                                $user_guide_widget_data="";
                                $user_guide_widget_data = ['user_guide_id'=>$guide_id,'widget_id'=>$relation->widget->id, 'title'=>$relation->widget->title, 'description'=>$relation->widget->description, 'enabled'=>1, 'web_browser'=>0, 'show_toolbar'=>0];
                                UserGuideWidget::create($user_guide_widget_data);
                            }
                            
                            
                        }

                    $savedata['id'] =$saved->id;
                    $file = UserGuide::find($savedata['id']);
                    if($file ->getMedia('user_guide_icon')->first()){
                        $result['icon'] = $file ->getMedia('user_guide_icon')->first()->getUrl('thumb'); 
                    }
                    if($file ->getMedia('user_guide_banner')->first()){
                        $result['banner'] = $file ->getMedia('user_guide_banner')->first()->getUrl('thumb');
                    }
                    $result['guide'] = $savedata;
                    
                    return $result;
                }
            });
        }
    }
    

        /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getByUserId($user_id, $orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model->where('user_id', $user_id)
            ->orderBy($orderBy, $sort)->get();
    }


    public function addGuideWidget($guide_id, $widget_id)
    {
        $widget = GuideWidget::find($widget_id);
        if($widget_id){
            $user_guide_widget_data="";
            $user_guide_widget_data = ['user_guide_id'=>$guide_id,'widget_id'=>$widget_id, 'title'=>$widget->title, 'description'=>$widget->description];
            $widget = UserGuideWidget::create($user_guide_widget_data);
            return $widget;
        }else{
            return false;
        }
    }

    public function removeGuideWidget($guide_id, $widget_id){
        $widget = UserGuideWidget::where('widget_id', '=', $widget_id);
        if($widget_id){
            $widget->delete();
            return UserGuideWidget::where("user_guide_id", "=", $guide_id)->get();
        }else{
            return false;
        }
    }

    
    public function getWidgetFields($widget_id)
    {
        
        if($widget_id){
            $field = GuideWidgetField::find($widget_id);
            return $field;
        }else{
            return false;
        }
    }


        /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getGuide($guide_id, $passphrase)
    {
        return $this->model->where("id", $guide_id)->with('widgets')->get();
    }

    /**
     * @param User $user
     * @param      $status
     *
     * @throws GeneralException
     * @return User
     */
    // public function mark(User $user, $status) : User
    // {
    //     if ($status === 0 && auth()->id() === $user->id) {
    //         throw new GeneralException(__('exceptions.backend.access.users.cant_deactivate_self'));
    //     }

    //     $user->active = $status;

    //     switch ($status) {
    //         case 0:
    //             event(new UserDeactivated($user));
    //         break;
    //         case 1:
    //             event(new UserReactivated($user));
    //         break;
    //     }

    //     if ($user->save()) {
    //         return $user;
    //     }

    //     throw new GeneralException(__('exceptions.backend.access.users.mark_error'));
    // }

}
