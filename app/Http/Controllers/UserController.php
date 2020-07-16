<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //indexメソッド
    public function index(Request $request)
    {
        //メソッドの引数でオブジェクトのインスタンス化=>(メソッドインジェクション)
        \Debugbar::info($request->q);


        //DB処理:usersテーブルから全データを取得する

        //Eloquentシステムでusersテーブルオブジェクトusersを使用する。

        $query = \App\User::all();

        //$queryをデバック
        if ($request->filled('q')) {
            //select* from users where name like('%$request->q%')
            $query = \App\User::where('name', 'LIKE', '%'.$request->q.'%')->get();
        }
        // dd($query);
        \Debugbar::info($query);
        return $query;
    }
}
