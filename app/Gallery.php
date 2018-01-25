<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    public function images()
    {
    	return $this->hasMany(Image::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
