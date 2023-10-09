<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Models\Game;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function category($category,$slug){
        // dd($category, $slug);
        return view('category', ['category' => $category, 'category_slug' => $slug]);
    }

    public function showGame($slug){
        // dd($category, $slug);
        
        return view('game.show', ['game_slug' => $slug]);
    }

    public function contact(){
        
        return view('contact');
    }
}
