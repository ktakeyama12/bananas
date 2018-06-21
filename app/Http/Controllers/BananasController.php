<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;
use App\Banana;
use DB;
class BananasController extends Controller
{
    
    public function index()
    {
    $bananas = Category::all();
    $users = User::all();
        
    $a = $categories->toArray();
        
        return view('categories.index', [
            'categories' => $categories,
            'users' => $users,
                        'a' => $a,
        ]);
    }
    
    public function show($id)
    {
        $categories = Category::find($id);

        return view('categories.show', [
            'categories' => $categories,
        ]);
    }
    public function create()
    {
        
        $banana = new Banana;
        $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        //$newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->get(1);
        
        return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
        ]);
    }
    public function store(Request $request)
    {
        $user_id = \Auth::user()->id;
        $check = DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        if($check->banana==$request->banana){
            $banana = new Banana;
            $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
            return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
            'message' => "既に投稿されてます",
        ]);
        }
        $banana = new Banana;
        $banana->banana = $request->banana;
        $banana->userid = $user_id;
        $banana->done = "0";
        $banana->save();
        $newbanana =  DB::table('bananas')->orderBy('updated_at', 'desc')->first();
        $banana = new Banana;
        return view('bananas.create', [
            'banana' => $banana,
            'newbanana' => $newbanana,
            'message' => "",
        ]);
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'categories' => $categories,
        ]);
    }
    public function update(Request $request, $id)
    {
        $category = Message::find($id);
        $category->content = $request->content;
        $category->save();

        return redirect('/');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/');
    }

}
