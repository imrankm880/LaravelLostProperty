<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemimage extends Model
{
    protected $table = 'itemimages';
    protected $fillable = ["item_id", "file_name"];
}
