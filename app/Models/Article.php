<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;
    public $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function createWithUserAndCategory($data)
    {
        $data['user_id'] = Auth::id();
        $data['category_id'] = Category::all()->first()->id;
        self::create($data);
    }
    public function updateImage($data)
    {
        $data['image'] = Storage::disk('local')->put('images', $data['image']);
        $this->update($data);
    }



}
