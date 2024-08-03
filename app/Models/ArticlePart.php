<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePart extends Model
{
    use HasFactory;
    protected $fillable = ['article_id', 'type', 'content', 'image_path', 'order'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public $timestamps = true;
}
