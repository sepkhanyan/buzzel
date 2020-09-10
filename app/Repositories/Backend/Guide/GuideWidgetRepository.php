<?php

namespace App\Repositories\Backend\Guide;

use App\Models\Guides\GuideWidget;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Guide\StoreGuideWidgetRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideWidgetRequest;

/**
 * Class GuideWidgetRepository.
 */
class GuideWidgetRepository extends BaseRepository
{
    /**
     * GuideCategoryRepository constructor.
     *
     * @param  GuideWidget  $model
     */
    public function __construct(GuideWidget $model)
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
     * @param StoreGuideWidgetRequest $request
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(StoreGuideWidgetRequest $request)
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
     * @param GuideWidget  $widget
     * @param UpdateGuideWidgetRequest $request
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GuideWidget $widget, UpdateGuideWidgetRequest $request)
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
