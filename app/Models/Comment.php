<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(User::Class,'user_id');
    }
    
    
    public function post()
    {
            return $this->belongsTo(Post::Class);
    }

}
