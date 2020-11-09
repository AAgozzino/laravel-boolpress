<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Relation article-user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}