<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lostitems extends Model
{
    protected  $fillable=['id','user_id','category','color','date','description','place','image'];


    public function user(){



        return $this->belongsTo(User::class);
    }

    public function lostimage(){
        return $this->hasOne(itemimage::class,'item_id','id');
    }

    public function report(){
        return $this->hasOne(report::class,'item_id','id');
    }
}
