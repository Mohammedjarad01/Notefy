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
        'color',
        'user_id',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    /**
     * تعريف العلاقة مع الوسوم (Tags)
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
