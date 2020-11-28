<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'author',
        'content',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
