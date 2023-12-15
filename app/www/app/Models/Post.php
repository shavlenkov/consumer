<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'title',
        'descr',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeNews(Builder $query) {
        $query->whereHas('category', function ($query) {
            $query->where('title', 'Новини');
        });
    }

    public function scopeAnnouncements(Builder $query) {
        $query->whereHas('category', function ($query) {
            $query->where('title', 'Анонси');
        });
    }

    public function scopeEvents(Builder $query) {
        $query->whereHas('category', function ($query) {
            $query->where('title', 'Події');
        });
    }

    public function scopeVideostories(Builder $query) {
        $query->whereHas('category', function ($query) {
            $query->where('title', 'Відеосюжети');
        });
    }
}
