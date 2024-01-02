<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Article $article, Request $request)
    {
        $user = Auth::user()->id;
        $existingLike = Like::where('article_id', $article->id)->where('user_id', $user)->first();

        if ($existingLike) {
            // If the user has already liked the article, unlike it
            $existingLike->delete();
        } else {
            // If the user hasn't liked the article yet, create a new like
            $like = new Like();
            $like->article_id = $article->id;
            $like->user_id = $user;
            $like->save();
        }

        // Redirect back to the article page
        return back();
    }
}
