<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['*'];

    public function cat(){
        return $this->hasOne('App\CatPost');
    }
}
