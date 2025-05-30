<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'description',
        'media_link',
        'thumbnail_link',
    ];

    public function userprofile()
    {
        return $this->belongsTo(UserProfile::class, 'created_by', 'id');
    }
}
