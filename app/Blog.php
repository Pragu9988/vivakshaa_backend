<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'cover_pic',
        'author',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Blog $blog) {
            $blog->slug = Str::slug($blog->title, '-') . '-' . strtotime(now());
        });
        static::updating(function (Blog $blog) {
            if ($blog->isDirty(['title'])) {
                $blog->slug = Str::slug($blog->title, '-') . '-' . strtotime(now());
            }
        });
    }
}
