<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'menu_items';

    protected $fillable = ['title', 'url', 'parent_id', 'page_type'];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }
    public function submenus()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }
}
