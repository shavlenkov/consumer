<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Taggable extends Pivot
{
    protected $table = 'taggables';
    protected $fillable = ['tag_id', 'taggable_id', 'taggable_type'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function taggables()
    {
        return $this->morphToMany();
    }
}
