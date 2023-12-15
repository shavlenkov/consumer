<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['name', 'slug'];
    public function videos()
    {
        return $this->morphedByMany(VideoStories::class, 'taggable');
    }
    public function events()
    {
        return $this->morphedByMany(Events::class, 'taggable');
    }
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }
    public function announcements()
    {
        return $this->morphedByMany(Announcement::class, 'taggable');
    }
}
