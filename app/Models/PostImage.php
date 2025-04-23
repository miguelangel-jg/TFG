<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'post_id'];

    // Relación con Post
    public function post()
    {
    return $this->belongsTo(Post::class);
    }

}
