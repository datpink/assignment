<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id', 'published_at', 'featured', 'view_count', 'category_id'];

    public function parts()
    {
        return $this->hasMany(ArticlePart::class)->orderBy('order');
    }

    public function getFirstImage()
    {
        return $this->parts()->where('type', 'image')->orderBy('order')->first();
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', '%'.$keyword.'%')
                     ->orWhere('content', 'like', '%'.$keyword.'%');
    }
    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
