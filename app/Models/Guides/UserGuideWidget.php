<?php

namespace App\Models\Guides;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class UserGuideWidget extends Model  implements HasMedia
{
           /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_guide_id',
        'widget_id',
        'title',
        'description',
        'enabled',
        'web_browser',
        'show_toolbar',
    ];

    protected $appends = ['icon', 'default_icon'];

    // to enable media upload for icon
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100)
              ->sharpen(10);

        $this->addMediaCollection('user_guide_widget_icons')
              ->singleFile();
    }

    public function getIconAttribute(){
        $response = $this->getMedia('user_guide_widget_icons')->first();
        if($response){
            return $response->getUrl('thumb');
        }else{
            return '';
        }
     }

    public function getDefaultIconAttribute(){
        return $this->parent_widget->thumb;
    }

    public function fields(){
        return $this->hasMany('App\Models\Guides\GuideWidgetField', 'widget_id', 'widget_id');
    }

    public function parent_widget()
    {
        return $this->hasOne('App\Models\Guides\GuideWidget', 'id', 'widget_id');
    }

}
