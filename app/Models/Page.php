<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public function getShortTextAttribute()
    {
        return $this->{'short_text_'.app()->getLocale()};
    }

    public function getTextAttribute()
    {
        return $this->{'text_'.app()->getLocale()};
    }
}
