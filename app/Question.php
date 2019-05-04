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

    //Accessors
    public function getUrlAttribute()
    {
        return route('questions.show', $this->id);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers > 0 ){
            if($this->best_answerd_id){
                return 'answered-accepted';
            }
            return 'answered';
        }

        return 'unanswered';
    }

}
