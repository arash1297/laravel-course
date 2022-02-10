<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $fillable=['name'];

//    public function posts()
//    {
//        return $this->morphedByMany('App\Models\Post' , 'taggable');
//    }
//    public function videos()
//    {
//        return $this->morphedByMany('App\Models\video' , 'taggable');
//    }
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function videos()
    {
        return $this->morphedByMany('App\Models\video', 'taggable');
    }
}
