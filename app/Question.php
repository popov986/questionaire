<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Arr;
use \Illuminate\Support\Str;

class Question extends Model
{

    protected $fillable = [
        'title', 'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //mutator
    public function setTitleAttribute($value)
    {
        $this->$attributes['title'] = $value;
        $this->$attributes['slug']  =  Str::slug($value);
    }
}
