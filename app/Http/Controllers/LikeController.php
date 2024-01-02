<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Article $article, Request $request)
    {
        // Get the authenticated user's ID
        $user = Auth::user()->id;

        // Check if the user has already liked the article
        $existingLike = Like::where('article_id', $article->id)->where('user_id', $user)->first();

        if (!$existingLike) {
            // If the user hasn't liked the article yet, create a new like
            $like = new Like();
            $like->article_id = $article->id;
            $like->user_id = $user;
            $like->save();
        }

        // Redirect back to the article page
        return back();
    }

    public function unlike(Article $article, Request $request)
    {
        $user = Auth::user()->id;
        $like = Like::where('article_id', $article->id)->where('user_id', $user)->first();

        // Check if the like exists before attempting to delete
        if ($like) {
            $like->delete();
        }

        return back();
    }
}
