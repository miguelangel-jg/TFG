<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = ['user_id', 'searched_user_id'];

    public function searchedUser()
    {
        return $this->belongsTo(User::class, 'searched_user_id');
    }
}
