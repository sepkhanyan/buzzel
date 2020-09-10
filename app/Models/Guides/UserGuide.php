<?php

namespace App\Models\Guides;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Illuminate\Database\Eloquent\Model;

class UserGuide extends Model  implements HasMedia
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'guide_template_id',
        'title',
        'description',
        'short_name',
        'event_from_date',
        'event_to_date',
        'timezone',
        'venue_name',
        'address',
        'street',
        'city',
        'state',
        'country',
        'zipcode',
        'lat',
        'lng',
        'privacy',
        'passphrase',
        'sharing'
    ];

    protected $appends = ['icon', 'banner'];

        // to enable media upload for icon
        use HasMediaTrait;

        public function registerMediaConversions(Media $media = null)
        {
            $this->addMediaConversion('thumb')
                  ->width(100)
                  ->height(100)
                  ->sharpen(10);
    
            $this->addMediaCollection('user_guides')
                  ->singleFile();
        }

        public function getIconAttribute(){
            $response = $this->getMedia('user_guide_icon')->first();
            if($response){
                return $response->getUrl('thumb');
            }else{
                return '';
            }
         }
    
         public function getBannerAttribute(){
            $response = $this->getMedia('user_guide_banner')->first();
            if($response){
                return $response->getUrl('thumb');
            }else{
                return '';
            }
         }

         public function widgets(){
            return $this->hasMany('App\Models\Guides\UserGuideWidget')->with("parent_widget")->with("fields");
         }
}
