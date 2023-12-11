<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->get();
        $data = [
            'articles' => $articles,
        ];

        return view('article', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // フォームに入力された内容を変数に取得
        $form = $request->except('_token');

        // フォームに入力された内容をデータベースへ登録
        $article = new Article();
        $article->user_id = \Auth::id();
        $article->fill($form)->save();

        // 記事一覧画面を表示
        return redirect()->route('article');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = ['article' => $article];
        return view('show', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('article'));
    }
}
