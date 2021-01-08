<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function block()
    {
        return $this->hasOne(Block::class, 'id', 'block_id');
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'floor_id', 'id');
    }
}
