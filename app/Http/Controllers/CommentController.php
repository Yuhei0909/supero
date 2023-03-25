<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Tweet;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Tweet $tweet, Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->text = $validatedData['text'];
        $comment->tweet_id = $tweet->id;
        $comment->user_id = Auth::user()->id;

        // 親コメントが指定されている場合は、そのコメントに対して返信する
        if ($request->parent_id) {
            $comment->parent_id = $request->parent_id;
        }

        $comment->save();

        return redirect()->back();
    }
}
