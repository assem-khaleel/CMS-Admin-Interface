<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

class WelcomeController extends Controller
{
public function index(){

   $search = \request()->query('search');

   if ($search){
       $posts = Post::where('title','LIKE',"%{$search}%")->simplePaginate(3);
   }else{
       $posts = Post::simplePaginate(3);
   }

    return view('welcome')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',Post::searched()->simplePaginate(3));
}
}
