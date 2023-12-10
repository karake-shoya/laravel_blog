<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        return view('home', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        $article = ['article' => $article];
        return view('show', $article);
    }
}
