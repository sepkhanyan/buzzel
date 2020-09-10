<?php

namespace App\Models\Guides\Templates;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guides\GuideCategory;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Models\Guides\GuideWidget;


class GuideTemplate extends Model implements HasMedia
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guide_category_id',
        'title',
        'description',
        'active',
    ];

    use HasMediaTrait;

    protected $appends = ['category', 'icon', 'banner'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100)
              ->sharpen(10);

        $this->addMediaCollection('guide_templates')
        ->singleFile();
    }

    public function getCategoryAttribute()
    {

        $category = GuideCategory::find($this->guide_category_id)->first();
        return $category->title;

    }

    public function getIconAttribute(){
        return $this->getMedia('guide_templates_icon')->first()->getUrl('thumb');
     }

     public function getBannerAttribute(){
        return $this->getMedia('guide_templates_banner')->first()->getUrl('thumb');
     }

     public function widgets()
     {
         return $this->hasManyThrough(
             'App\Models\Guides\GuideWidget',
             'App\Models\Guides\Templates\GuideTemplateWidget',
             'widget_id',
             'id'
            );
     }     
}
