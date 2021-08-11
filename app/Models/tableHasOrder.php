<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableHasOrder extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
    public function table()
    {
        return $this->belongsTo(table::class, 'table_id', 'id');
    }
}
