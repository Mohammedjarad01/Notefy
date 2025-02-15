<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
        'user_id',
        'images',

    ];
    protected $casts = [
    'images'=> 'array',
    ];



}
