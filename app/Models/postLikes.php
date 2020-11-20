<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postLikes extends Model
{
    use HasFactory;
    protected $fillable = [
        'liked_by',
        'user_id'
    ];
}
