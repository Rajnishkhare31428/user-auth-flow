<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postComments extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'commented_by',
        'user_id'
    ];
}
