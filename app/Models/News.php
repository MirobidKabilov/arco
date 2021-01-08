<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['published_at'];

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

    public function getPublishedAtAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->format('d-m-Y');
    }

    public function setPublishedAttribute($value)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('d-m-Y', $value);            
    }
}
