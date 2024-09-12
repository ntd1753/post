<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTransation extends Model
{
    use HasFactory;
    protected $fillable =[
        'locale_id',
        'post_id',
        'name',
        'content'
    ];
    public function locales()
    {
        return $this->belongsTo(Locate::class, 'locale_id');
    }
}
