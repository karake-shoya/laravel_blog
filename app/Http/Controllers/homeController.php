<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('article', ['articles' => $articles]);
    }
}
