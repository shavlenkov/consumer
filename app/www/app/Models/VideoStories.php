<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoStories extends Model
{
    use HasFactory;
    protected $table = 'video_stories';
    protected $fillable = [
        'id',
        'title',
        'content',
        'thumbnail',
        'slug'];
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
