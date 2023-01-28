<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded= [];
    protected $with = ['category','author'];
        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function scopeFilter($query,array $filters)
        {
            $query->when(isset($filters['search']),function($query){
                $query
                ->where('title','like','%' . request('search') . '%')
                ->orwhere('body','like','%' . request('search') . '%');

            });
        }

        public function author()
        {
            return $this->belongsTo(User::Class,'user_id');
        }
}
