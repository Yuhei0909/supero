<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data, [
            'tweet_id' =>['required', 'integer'],
            'nickname' =>['required', 'integer'],
            'text'     =>['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $comment->commentStore($user->id, $data);

        return back();
    }
}
