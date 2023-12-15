<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
//use Astrotomic\Translatable\Translatable;
use Spatie\Translatable\HasTranslations;
class News extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'news';
    protected $fillable = [
        'id',
        'title',
        'content',
        'thumbnail',
        'slug'];
    public $translatable = ['title','content','slug'];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
    public function getTypeAttribute()
    {
        return 'news';
    }
}
