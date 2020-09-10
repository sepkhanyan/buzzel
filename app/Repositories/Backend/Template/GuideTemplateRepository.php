<?php

namespace App\Repositories\Backend\Template;

use App\Models\Guides\Templates\GuideTemplate;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Template\ManageGuideTemplateRequest;
use App\Http\Requests\Backend\Template\StoreGuideTemplateRequest;
use App\Http\Requests\Backend\Template\UpdateGuideTemplateRequest;

/**
 * Class GuideTemplateRepository.
 */
class GuideTemplateRepository extends BaseRepository
{
    /**
     * GuideTemplateRepository constructor.
     *
     * @param  GuideTemplate  $model
     */
    public function __construct(GuideTemplate $model)
    {
        $this->model = $model;
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
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(StoreGuideTemplateRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            $template = $this->model::create([
                'guide_category_id' => $request->category_id,
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ]);
                
            // See if file uploaded
            if($request->hasFile('icon') && $request->file('icon')->isValid()){
                $template->addMediaFromRequest('icon')->toMediaCollection('guide_templates_icon');
            }

            if($request->hasFile('banner') && $request->file('banner')->isValid()){
                $template->addMediaFromRequest('banner')->toMediaCollection('guide_templates_banner');
            }

            if ($template) {
                return $template;
            }

            throw new GeneralException(__('exceptions.backend.templates.create_error'));
        });
        
    }

    /**
     * @param GuideTemplate  $template
     * @param array $request
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GuideTemplate $template, UpdateGuideTemplateRequest $request)
    {

        return DB::transaction(function () use ($template, $request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            
            if ($template->update([
                'guide_category_id' => $request->category_id,
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ])) {

                // See if file uploaded
                if($request->hasFile('icon') && $request->file('icon')->isValid()){
                    //remove older files
                    $template->clearMediaCollection('guide_templates_icon');
                    $template->addMediaFromRequest('icon')->toMediaCollection('guide_templates_icon');
                }
                if($request->hasFile('banner') && $request->file('banner')->isValid()){
                    //remove older files
                    $template->clearMediaCollection('guide_banner');
                    $template->addMediaFromRequest('banner')->toMediaCollection('guide_templates_banner');
                }

                return $template;
            }

            throw new GeneralException(__('exceptions.backend.templates.update_error'));
        });
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
/*
    * @param int    $paged
    * @param string $orderBy
    * @param string $sort
    *
    * @return mixed
    */
   public function getByCategory($category_id, $orderBy = 'created_at', $sort = 'desc')
   {
       $result = $this->model;
      if($category_id!='all'){ 
        $result = $result->where("guide_category_id", $category_id);
      }
      $result= $result->orderBy($orderBy, $sort)->get();
      return $result;

   }

}
