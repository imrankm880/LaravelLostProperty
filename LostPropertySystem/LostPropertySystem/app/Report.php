<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable=['id','user_id','item_id','subject','description'];


    public function user(){
 return $this->belongsTo(User::class);
}


    public function lostItem(){
        return $this->belongsTo(lostitems::class,'item_id','id');
    }

}
