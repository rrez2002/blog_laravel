<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'admin',
        'status',
    ];
    /**
     * @var mixed
     */

    public function likes()
    {
        return $this->hasOne(Like::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($query, $keyword)
    {
        $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('content', 'LIKE', '%' . $keyword . '%');
        return $query;
    }

    //    MUTATOR
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

//    accessor
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
}
