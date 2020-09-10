<?php

namespace App\Repositories\Frontend\Template;

use App\Models\Guides\Templates\GuideTemplate;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class GuideTemplateRepository.
 */
class GuideTemplateRepository extends BaseRepository
{
    /**
     * GuideCategoryRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(GuideTemplate $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     *
     * @throws GeneralException
     * @return mixed
     */
    public function findBycategoryid($id)
    {
        $templates = $this->model::where('guide_category_id', $id)->get();

        if ($templates) {
            return $templates;
        }

        throw new GeneralException(__('exceptions.backend.guides.not_found'));
    }


}
