<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
class FrontendController extends Controller
{
    public function index(){  
        //dd(Post::orderBy('created_at','desc')->skip(1)->take(1)->get());
        return view('index')
                ->with('site_name',Setting::first()->site_name)
                ->with('categories',Category::all()->take(4))
                ->with('first_post',Post::orderBy('created_at','desc')->first())
                ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                ->with('laravel',Category::find(4))
                ->with('node',Category::find(5))
                ->with('setting',Setting::first());


    }
}
