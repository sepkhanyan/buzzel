<?php

namespace App\Events\Backend\Template;

use Illuminate\Queue\SerializesModels;

/**
 * Class GuideTemplateDeleted.
 */
class GuideTemplateDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $template;

    /**
     * @param $template
     */
    public function __construct($template)
    {
        $this->template = $template;
    }
}