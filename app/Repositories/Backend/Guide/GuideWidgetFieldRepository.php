<?php

namespace App\Repositories\Backend\Guide;

use App\Models\Guides\GuideWidgetField;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Guide\StoreGuideWidgetFieldRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideWidgetFieldRequest;

/**
 * Class GuideWidgetFieldRepository.
 */
class GuideWidgetFieldRepository extends BaseRepository
{
    /**
     * GuideWidgetFieldRepository constructor.
     *
     * @param  GuideWidgetField  $model
     */
    public function __construct(GuideWidgetField $model)
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
     * @param StoreGuideWidgetFieldRequest $request
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(StoreGuideWidgetFieldRequest $request)
    {
        return DB::transaction(function () use ($request) {
 
            $field = $this->model::create([
                'widget_id' => $request->widget_id,
                'field_key' => $request->field_key,
                'type' => $request->type,                
                'description' => $request->description
            ]);

            if ($field) {

                //event(new GuideCategoryCreated($category));

                return $field;
            }

            throw new GeneralException(__('exceptions.backend.guides.widgets.fields.create_error'));
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
    public function update(GuideWidgetField $field, UpdateGuideWidgetFieldRequest $request)
    {

        return DB::transaction(function () use ($field, $request) {
            if ($field->update([
                'widget_id' => $request->widget_id,
                'field_key' => $request->field_key,
                'type' => $request->type,
                'description' => $request->description
            ])) {
                //event(new GuideCategoryUpdated($category));

                return $field;
            }

            throw new GeneralException(__('exceptions.backend.guides.widgets.fields.update_error'));
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

    public function getByWidgetPaginated($widget_id, $paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model->where("widget_id", "=", $widget_id)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

}
