<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function floors()
    {
        return $this->hasMany(Floor::class, 'block_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->{'name_'.app()->getLocale()};
    }
}
