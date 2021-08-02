<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableHasProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id','product_id'
    ];


    public function products()
    {
        return $this->hasMany(product::class,'id','product_id');
    }


}
