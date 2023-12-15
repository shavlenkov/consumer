<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementTranslation extends Model
{
    use HasFactory;

    protected $table = 'announcement_translatable';

    protected $fillable = [ 'title', 'content'];

    public $timestamps = false;

    public function getTypeAttribute()
    {
        return 'announcement';
    }
    public function tags()
    {
        return $this->morphMany(Taggable::class, 'taggable');
    }
}
