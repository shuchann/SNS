<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    
    public function Nice()
    {
        return $this->hasMany(Nice::class, 'post_id');
    }
    
    public function is_nice_by_auth_user()
        {
        $id = Auth::id();
    
        $likers = array();
        foreach($this->Nice as $like) {
          array_push($likers, $like->user_id);
        }
    
        if (in_array($id, $likers)) {
          return true;
        } else {
          return false;
        }
    }
    
    // public function comments(): HasMany
    // {
    // return $this->hasMany(Comment::class);
    // }
}