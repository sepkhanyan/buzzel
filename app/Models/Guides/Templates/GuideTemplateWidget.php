<?php

namespace App\Models\Guides\Templates;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guides\GuideWidget;

class GuideTemplateWidget extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guide_template_id',
        'widget_id',
    ];

        /**
     * Get the post that owns the comment.
     */
    public function widget()
    {
        return $this->belongsTo('App\Models\Guides\GuideWidget');
    }
}
