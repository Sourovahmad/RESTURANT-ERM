<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableHasMenu extends Model
{
    use HasFactory;


    public function menu()
    {
        return $this->belongsTo(menu::class, 'menu_id', 'id');
    }
}
