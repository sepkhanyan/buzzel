<?php

namespace App\Repositories\Backend\Guide;

use App\Models\Guides\GuideCategory;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Guide\ManageGuideCategoryRequest;
use App\Http\Requests\Backend\Guide\StoreGuideCategoryRequest;
use App\Http\Requests\Backend\Guide\UpdateGuideCategoryRequest;

/**
 * Class GuideCategoryRepository.
 */
class GuideCategoryRepository extends BaseRepository
{
    /**
     * GuideCategoryRepository constructor.
     *
     * @param  GuideCategory  $model
     */
    public function __construct(GuideCategory $model)
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
    public function create(StoreGuideCategoryRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            $category = $this->model::create([
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ]);
                
            // See if file uploaded
            if($request->hasFile('icon') && $request->file('icon')->isValid()){
                $category->addMediaFromRequest('icon')->toMediaCollection('guide_categories');
            }

            if ($category) {

                //event(new GuideCategoryCreated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.guides.create_error'));
        });
        
    }

    /**
     * @param GuideCategory  $category
     * @param array $request
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GuideCategory $category, UpdateGuideCategoryRequest $request)
    {

        return DB::transaction(function () use ($category, $request) {
            $status = 1;
            if($request->active == null){
                $status = 0;
            }
            
            if ($category->update([
                'title' => $request->title,
                'active' => $status,
                'description' => $request->description
            ])) {

                // See if file uploaded
                if($request->hasFile('icon') && $request->file('icon')->isValid()){
                    //remove older files
                    $category->clearMediaCollection('guide_categories');
                    $category->addMediaFromRequest('icon')->toMediaCollection('guide_categories');
                }
                //event(new GuideCategoryUpdated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.guides.update_error'));
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

}
