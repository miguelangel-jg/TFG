<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con imagenes
    public function images()
    {
    return $this->hasMany(PostImage::class);
    }

    public function likes()
{
    return $this->hasMany(Like::class);
}

public function likedBy(User $user)
{
    return $this->likes->where('user_id', $user->id)->count() > 0;
}


}
