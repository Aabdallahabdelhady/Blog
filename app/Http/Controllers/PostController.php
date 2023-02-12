<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class PostController extends Controller
{
        public function index(){
            
        return view('posts.index',[
            'posts' => Post::latest()->filter(
                request(['search','category','author'])
            )->paginate(6)->withQueryString()
        ]);
        }

        public function show(Post $post)
        { 
            return view('posts.show',[
                'post'=>  $post
                ]);
        }

        public function create()
        { 
            
            return view('posts.create');
        }

        public function store()
        { 
            $attributes = request()->validate([
                'title' => 'required',
                'slug' => 'required|unique:posts,slug',
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => 'required|exists:categories,id'
            ]);
            $attributes['user_id'] = auth()->id();

            Post::create($attributes);
            return redirect('/');
        }

        
}
