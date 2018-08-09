<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    //
    public $timestamps=false;
    protected $fillable=['url','shortened'];

    public static function getUniqueShortendUrl(){
    	$shortened=str_random(5);

    	if (URL::whereShortened($shortened)->count()>0){
    		URL::getUniqueShortendUrl();
    	}
    	return $shortened;
    }
}
