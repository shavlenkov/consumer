<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_translatable';

    protected $fillable = [ 'title', 'content'];
    public $timestamps = false;
    public function getTypeAttribute()
    {
        return 'news';
    }
    public function tags()
    {
        return $this->morphToMany(Taggable::class, 'taggable');
    }
}
