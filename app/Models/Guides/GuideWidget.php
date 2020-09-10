<?php

namespace App\Models\Guides;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class GuideWidget extends Model implements HasMedia
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'active',
    ];

    protected $appends = [
        'thumb'
    ];

    // to enable media upload for icon
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100)
              ->sharpen(10);

        $this->addMediaCollection('guide_templates')
              ->singleFile();
    }

    public function getThumbAttribute(){
       return $this->getMedia('guide_widgets_backend')->first()->getUrl('thumb');
    }

            /**
     * Scope a query to only include active categories.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function fields(){
        return $this->hasMany('App\Models\Guides\GuideWidgetField', 'id', 'widget_id');
    }
}
