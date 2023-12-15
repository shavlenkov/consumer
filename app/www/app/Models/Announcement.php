<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Announcement extends Model
{
    use HasFactory, Translatable;

    protected $table = 'announcement';

    protected $fillable = ['id', 'title','content','slug', 'thumbnail'];

    public $translatedAttributes = ['title','content'];

    public function getTypeAttribute()
    {
        return 'announcement';
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
