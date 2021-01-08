<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function floor()
    {
        return $this->hasOne(Floor::class, 'id', 'floor_id');
    }
}
