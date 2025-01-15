<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $guarded = [];
    public function articles(): HasMany
    {
//        return $this->belongsTo('App\Models\Category');
        return $this->hasMany(Article::class);
    }
}
