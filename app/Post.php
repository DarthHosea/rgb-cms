<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    // Mutator
    // public function setImageAttribute($value)
    // {

    //     $this->attributes['image'] = asset($value);
    // }

    // Accessor

    public function getImageAttribute($value)
    {
        $value = 'storage/' . $value;
        return asset($value);
    }
}
