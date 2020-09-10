<?php

namespace App\Repositories\Frontend\Guide;

use App\Models\Guides\GuideCategory;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository.
 */
class GuideCategoryRepository extends BaseRepository
{
    /**
     * GuideCategoryRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(GuideCategory $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     *
     * @throws GeneralException
     * @return mixed
     */
    public function findByid($id)
    {
        $category = $this->model
            ->find($id)
            ->first();

        if ($category instanceof $this->model) {
            return $category;
        }

        throw new GeneralException(__('exceptions.backend.guides.not_found'));
    }


}
