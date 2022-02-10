<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $date=['deleted_at'];
    protected $fillable=['title','content'];
    public $directory = '/images/';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class , 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=strtoupper($value);
    }
}
