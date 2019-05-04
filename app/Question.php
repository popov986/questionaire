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

    //mutator (on each title entrance it will populte slug AS small leters with -
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->id);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
