<?php

namespace App\Models\Guides;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class UserGuideWidgetField extends Model implements HasMedia
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_guide_widget_id',
        'guide_widget_field_id',
        'key',
        'value',
    ];

    // to enable media upload for icon
    use HasMediaTrait;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(100)
              ->height(100)
              ->sharpen(10);

        $this->addMediaCollection('photo_album')
              ->singleFile();

        $this->addMediaCollection('sponser_ads')
        ->singleFile();              
    }

    public function fields(){
        return $this->belongsTo('App\Models\Guides\GuideWidgetField', 'guide_widget_field_id', 'id')->withDefault();
    }
}
