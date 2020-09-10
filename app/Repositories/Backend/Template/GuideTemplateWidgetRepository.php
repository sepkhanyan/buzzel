<?php

namespace App\Repositories\Backend\Template;

use App\Models\Guides\Templates\GuideTemplateWidget;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Template\ManageGuideTemplateWidgetRequest;
use App\Http\Requests\Backend\Template\StoreGuideTemplateWidgetRequest;
use App\Http\Requests\Backend\Template\UpdateGuideTemplateWidgetRequest;

/**
 * Class GuideTemplateWidgetRepository.
 */
class GuideTemplateWidgetRepository extends BaseRepository
{
    /**
     * GuideTemplateWidgetRepository constructor.
     *
     * @param  GuideTemplateWidget  $model
     */
    public function __construct(GuideTemplateWidget $model)
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
    public function create(StoreGuideTemplateWidgetRequest $request)
    {
        return DB::transaction(function () use ($request) {
            foreach($request->widget_id as $widget){
                $template = $this->model::create([
                    'guide_template_id' => $request->guide_template_id,
                    'widget_id' => $widget,
                ]);
            }

           // throw new GeneralException(__('exceptions.backend.templates.widgets.create_error'));
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
   public function getWidgetBytemplate($template_id, $paged = 25, $orderBy = 'created_at', $sort = 'desc')
   {
       $result = $this->model;
      if($template_id!='all'){ 
        $result = $result->where("guide_template_id", $template_id);
      }
      $result= $result->with('widget')->orderBy($orderBy, $sort)->paginate($paged);
      return $result;

   }

}
