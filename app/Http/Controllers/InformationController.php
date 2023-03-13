<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Information;
use Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::getAllOrderByUpdated_at();
        return response()->view('information.index',compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('information.create');
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
            'icon' => 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'blood_type' => 'required',
            'family' => 'required',
            'hobby' => 'required',
            'specialty' => 'required',
            'like' => 'required',
            'dislike' => 'required',
            'theme' => 'required',
    ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('information.create')
                ->withInput()
                ->withErrors($validator);
    }
    // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
    $data = $request->merge(['user_id' => Auth::user()->id])->all();
    $result = Information::create($data);

    // tweet.index」にリクエスト送信（一覧ページに移動）
    return redirect()->route('information.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::find($id);
        return response()->view('information.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Information::find($id);
        return response()->view('information.edit', compact('information'));
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
            'icon' => 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'blood_type' => 'required',
            'family' => 'required',
            'hobby' => 'required',
            'specialty' => 'required',
            'like' => 'required',
            'dislike' => 'required',
            'theme' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('information.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        $result = Information::find($id)->update($request->all());
        return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Information::find($id)->delete();
        return redirect()->route('information.index');
    }
}
