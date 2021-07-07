<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,SoftDeletes;

        protected $fillable = [
            'name',
            'active_status',
            'category_id',
            'image_small',
            'image_big',
        ];

    public function category()
        {
        return $this->belongsTo(category::class,'category_id','id');
        }
}
