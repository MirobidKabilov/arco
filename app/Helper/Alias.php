<?php

namespace App\Helper;
use Illuminate\Support\Str;

class Alias
{
	/**
	 * Создатель alias 
	 * 
	 * @param  Object $model
	 * @param  string $value
	 * 
	 * @return string
	 */
    public static function alias($model, $value)
    {
        $slug = Str::slug($value);
        $slugCount = count($model->whereRaw("alias REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}