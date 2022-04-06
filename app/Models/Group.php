<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    const ROOT_ID = 0;

    public function scopeRoot()
    {
        return $this->where('id_parent', self::ROOT_ID)->get();
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'id_parent', 'id');
    }

    public function parent()
    {
        return $this->hasOne(self::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'id_group');
    }
}
