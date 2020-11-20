<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content',
        'description',
        'like_counts',
        'comment_counts'
    ];
}
