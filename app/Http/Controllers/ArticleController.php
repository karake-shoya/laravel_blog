<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Auth::user()->articles()->orderBy('created_at', 'desc')->get();
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
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:8192', // adjust the validation rules as needed
        ]);

        $form = $request->except('_token');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article_images', 'public');
            $form['image'] = $imagePath;
        }

        $article = new Article();
        $article->user_id = Auth::id();
        $article->fill($form)->save();

        return redirect()->route('article');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $like = Like::where('article_id', $article->id)->where('user_id', auth()->user()->id)->first();
        return view('show', compact('article', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // adjust the validation rules as needed
        ]);

        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article not found.');
        }

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article_images', 'public');
            $article->image = $imagePath;
        }

        $article->save();

        return redirect()->route('articles.show', $id)->with('success', '記事が更新されました。');
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
