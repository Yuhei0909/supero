<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;
use Auth;
use App\Models\User;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::getAllOrderByUpdated_at();
        return response()->view('tweet.index',compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    // バリデーション
    $validator = Validator::make($request->all(), [
      'tweet' => 'required | max:191',
      'description' => 'required',
    ]);
    // バリデーション:エラー
    if ($validator->fails()) {
      return redirect()
        ->route('tweet.create')
        ->withInput()
        ->withErrors($validator);
    }

    // 🔽 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
    $data = $request->merge(['user_id' => Auth::user()->id])->all();
    $result = Tweet::create($data);

    // tweet.index」にリクエスト送信（一覧ページに移動）
    return redirect()->route('tweet.index');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::find($id);
        return response()->view('tweet.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = Tweet::find($id);
        return response()->view('tweet.edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tweet' => 'required | max:191',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('tweet.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        $result = Tweet::find($id)->update($request->all());
        return redirect()->route('tweet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Tweet::find($id)->delete();
        return redirect()->route('tweet.index');
    }
    
    public function mydata()
    {
        $tweets = User::query()
            ->find(Auth::user()->id)
            ->userTweets()
            ->orderBy('created_at','desc')
            ->get();
        return response()->view('tweet.index', compact('tweets'));
    }
    
    public function timeline()
    {
        $followings = User::find(Auth::id())->followings->pluck('id')->all();
        $tweets = Tweet::query()
            ->where('user_id', Auth::id())
            ->orWhereIn('user_id', $followings)
            ->orderBy('updated_at', 'desc')
            ->get();
        return response()->view('tweet.index', compact('tweets'));
    }

}
