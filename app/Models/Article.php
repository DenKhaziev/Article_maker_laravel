<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public $guarded = [];

    public function category(): BelongsTo
    {
//        return $this->belongsTo('App\Models\Category');
        return $this->belongsTo(Category::class);
    }

}
