<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo//モデル名※todosテーブル全データ取得
        ::all();
        return view ('index', ['items'=> $items]);//index.blade.phpにitemsの情報をもたせたまま画面表示させる
    }

    
    public function create(Request $request)
    {   
        $this->validate($request,Todo::$rules);//バリデーションの記述を入れる↑<br/>
        $form = $request->all();//「$requestの内容を$formに格納する」という記述を追加する↑
        Todo::create($form);
        return redirect('/');
    }


    public function update(Request $request) 
    {
        $this->validate($request, Todo::$rules);
        Todo::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id',$request->id)->update($form);
        return redirect('/');
    } 


    public function delete(Request $request) 
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    } 
}
//useでClientモデルをまずはインポートしています。
//indexアクションでは、Client:allで全レコードを呼び出し、これを$itemsという変数に渡しています。
//addアクションではフォーム用のページに遷移するように設定しています。createアクションで送信された値をClientsテーブルに追加します。
