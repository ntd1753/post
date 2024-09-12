<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'author_id',
        'name',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id'); // Post thuộc về một User
    }

    // Quan hệ một-nhiều (One-to-Many) với PostTranslation
    public function translations()
    {
        return $this->hasMany(PostTransation::class, 'post_id'); // Post có nhiều bản dịch
    }
}
