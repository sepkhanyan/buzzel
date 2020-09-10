<?php

namespace App\Events\Backend\Guide;

use Illuminate\Queue\SerializesModels;

/**
 * Class GuideCategoryDeleted.
 */
class GuideCategoryDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $category;

    /**
     * @param $category
     */
    public function __construct($category)
    {
        $this->category = $category;
    }
}