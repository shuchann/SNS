<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'image_url',
    'kyapusyon',
    'hat',
    'tops',
    'pants',
    'shoes',
    'accessories',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
