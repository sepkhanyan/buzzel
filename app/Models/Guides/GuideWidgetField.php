<?php

namespace App\Models\Guides;

use Illuminate\Database\Eloquent\Model;

class GuideWidgetField extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'widget_id',
        'type',
        'field_key',
        'description',
    ];

    // protected $appends = ['input_type'];

    // public function getInputTypeAttribute(){
    //     $getFieldInfo = [
    //         'Facebook' => array(['type'=>'text', 'data'=>'url', 'label'=>'Facebook URL', 'note'=> "Enter your facebook url to display a mobile formatted Facebook page within your guide."]),
    //         'Instagram'=> array(
    //             ['type'=>'text', 'data'=>'url', 'label'=>'Hashtag', 'note'=> "Tweets with this hashtag will appear in your guide. Don't include the '#' symbol."],
    //             ['type'=>'text', 'data'=>'url', 'label'=>'Accounts', 'note'=> "Tweets from this account will appear in your guide. Don't include the '@' symbol."],
    //         ),
    //         'Youtube'=>array(
    //             ['type'=>'text', 'data'=>'url', 'label'=>'Enter URL','multiple'=>true ,'note'=> "Added links will play in mobile application"],
    //         ),
    //         'Vimeo'=>array(
    //             ['type'=>'text', 'data'=>'url', 'label'=>'Enter URL','multiple'=>true ,'note'=> "Added links will play in mobile application"],
    //         ),
    //         'Pictures'=>array(
    //             ['type'=>'text', 'data'=>'url', 'label'=>'Enter URL','multiple'=>true ,'note'=> "Added links will play in mobile application"],
    //         ),
    //     ];
        
    // }
}
